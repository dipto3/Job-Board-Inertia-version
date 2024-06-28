<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;

class AdminAuthService
{
    public function adminLogin($request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            return $request->session()->regenerate();
        }
    }
}
