<?php

namespace App\Http\Controllers\Auth;

use App\Events\RequestedLogin;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\View\View;

class LoginController extends Controller
{
    public function index(Request $request): RedirectResponse
    {
        $user = User::whereToken($request->token)->firstOrFail();

        Auth::login($user);

        return redirect(route('ads.index'));
    }

    public function create(): View
    {
        return view('auth.login');
    }

    public function store(Request $request): RedirectResponse
    {
        $user = User::whereEmail($request->email)->first();
        if ($user && $user->exists) {
            $user->update(['token' => Str::random(40)]);
            RequestedLogin::dispatch($user);
        }

        return redirect()->route('ads.index')->with('success', 'User created successfuly');
    }

    public function delete(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->getSession()->invalidate();
        $request->getSession()->regenerateToken();

        return redirect(route('ads.index'));
    }
}
