<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Str;
use Illuminate\View\View;

class RegisterController extends Controller
{
    public function index(): View
    {
        return view('auth.register');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nickname' => ['required', 'string', 'max:25', 'unique:users'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
        ]);

        // check if email is unique,
        // but don't display any error message to avoid phishing
        if (! User::where('email', $request->email)->exists()) {
            User::create([
                'nickname' => $request->nickname,
                'email' => $request->email,
                'token' => Str::random(40),
                'token_generated_at' => Date::now(),
            ]);
        }

        // also generate some sort of notification (later)
        return redirect(route('ads.index'));
    }

    public function create(): View
    {
        return view('auth.register');
    }
}
