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
    public function index(Request $request): View
    {
        $user = User::whereToken($request->token)->first();
        if ($user === null)
            return view('auth.err.user-not-found');

        Auth::login($user);
        return view('main', ['user' => $user]);
    }

    public function create(): View
    {
        return view('auth.login');
    }

    public function store(Request $request): RedirectResponse
    {
        $user = User::whereEmail($request->email)->first();
        if ($user->exists) {
            $user->update(['token' => Str::random(40)]);
            RequestedLogin::dispatch($user);
        }
        return redirect(route('main'));
    }
    public function delete(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session->invalidate();
        $request->session->regenerateToken();
        
        return redirect(route('main'));
    }
}
