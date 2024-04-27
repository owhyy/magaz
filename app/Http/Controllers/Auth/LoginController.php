<?php

namespace App\Http\Controllers\Auth;

use App\Events\RequestedLogin;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LoginController extends Controller
{
    private User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index(Request $request): RedirectResponse
    {
        $userWithToken = $this->user->whereToken($request->token)->firstOrFail();
        auth()->login($userWithToken);

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
            $user->setLoginToken();
            RequestedLogin::dispatch($user);
        }

        return $this->redirectHome()->with('success', 'User created successfuly');
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
