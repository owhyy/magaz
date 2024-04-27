<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\RegisterRequest;
use App\Models\LoginToken;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class RegisterController extends Controller
{
    public function __construct(private readonly User $user, private readonly LoginToken $token)
    {
    }

    public function store(RegisterRequest $request): RedirectResponse
    {
        // check if email is unique,
        // but don't display any error message to avoid phishing
        if (!$this->user->whereEmail($request->validated()['email'])->exists()) {
            $user = $this->user->create($request->validated());
            $this->token->create(['email' => $user->email]);
        }

        // also generate some sort of notification (later)
        return redirect(route('ads.index'));
    }

    public function create(): View
    {
        return view('auth.register');
    }
}
