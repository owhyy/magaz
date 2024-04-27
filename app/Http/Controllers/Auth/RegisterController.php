<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\RegisterRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Str;
use Illuminate\View\View;

class RegisterController extends Controller
{
    private User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function store(RegisterRequest $request): RedirectResponse
    {
        // check if email is unique,
        // but don't display any error message to avoid phishing
        if (! $this->user->whereEmail($request->validated()['email'])->exists()) {
            $this->user->create($request->validated() +
                [
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
