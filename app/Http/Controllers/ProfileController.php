<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function __construct(private readonly User $user) {}

    public function show(string $nickname): View
    {
        $user = $this->user->whereNickname($nickname)->firstOrFail();
        return view('profile.get', ['user' => $user]);
    }

    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => auth()->user(),
        ]);
    }
}
