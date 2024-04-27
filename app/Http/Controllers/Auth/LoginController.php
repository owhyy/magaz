<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\LoginToken;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LoginController extends Controller
{
    private User $user;
    private LoginToken $token;

    public function __construct(User $user, LoginToken $token)
    {
        $this->user = $user;
        $this->token = $token;
    }

    public function index(Request $request): RedirectResponse
    {
        $token = $this->token->whereValue($request->token)->firstOrFail();
        if ($token->valid_until < Carbon::now()) {
            return $this->redirectHome()->withErrors(['message' => 'Auth link has expired. Create a new one']);
        }

        $user = $this->user->whereEmail($token->email)->firstOrFail();
        auth()->login($user);

        return $this->redirectHome();
    }

    public function create(): View
    {
        return view('auth.login');
    }

    public function store(Request $request): RedirectResponse
    {
        $user = $this->user->whereEmail($request->email)->first();
        if ($user !== null) {
            if ($this->token->canCreateToday($user->email)) {
                $this->token->invalidateAllOthers($user->email);
                $this->token->create(['email' => $user->email]);
            } else {
                return $this->redirectHome()->withErrors(['message' => 'Daily limit for login tokens reached. You can use the latest provided link to log in']);
            }
        }

        return $this->redirectHome()->withSuccess('If an user with this email exists, a login link will be sent to it.');
    }

    public function delete(Request $request): RedirectResponse
    {
        auth()->logout();
        $request->getSession()->invalidate();

        return $this->redirectHome();
    }

    private function redirectHome(): RedirectResponse
    {
        return redirect()->route('ads.index');
    }
}
