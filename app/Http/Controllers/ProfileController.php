<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user,
        ]);
    }

    public function show(string $nickname): View
    {
        $user = User::whereNickname($nickname)->firstOrFail();

        return view('profile.get', [
            'user' => $user,
        ]);
    }
}
