<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.admin-login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => ['required','email'],
            'password' => ['required','string'],
        ]);

        $user = User::where('email', $credentials['email'])->first();

        // User not found or not admin?
        if (! $user || $user->role !== 'admin') {
            return back()->withErrors(['email' => 'You are not allowed to login from here'])->withInput();
        }

        // Admin must be verified
        if (! $user->email_verified_at) {
            return back()->withErrors(['email' => 'Please verify your email'])->withInput();
        }

        // Now attempt to login
        if (Auth::attempt($credentials, false)) {
            $request->session()->regenerate();
            return redirect()->route('admin.home');
        }

        return back()->withErrors(['email' => 'Invalid password'])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login.admin');
    }
}
