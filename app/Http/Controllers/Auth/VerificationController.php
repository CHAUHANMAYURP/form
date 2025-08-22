<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class VerificationController extends Controller
{
    public function show(Request $request)
    {
        return view('auth.verify', ['email' => $request->query('email')]);
    }

    public function verify(Request $request)
    {
        $data = $request->validate([
            'email' => ['required','email','exists:users,email'],
            'code'  => ['required','digits:6'],
        ], [
            'email.exists' => 'not found your account with that email.',
        ]);

        $user = User::where('email', $data['email'])->first();

        if ($user->email_verified_at) {
            return redirect()->route('login.admin')->with('status', 'Your email is already verified. Please login.');
        }

        if (!$user->verification_code_hash || !$user->verification_expires_at || now()->greaterThan($user->verification_expires_at)) {
            return back()->withErrors(['code' => 'Verification code is expired. Please register again.'])->withInput();
        }

        if (! Hash::check($data['code'], $user->verification_code_hash)) {
            return back()->withErrors(['code' => 'Invalid verification code.'])->withInput();
        }

        // Mark as verified
        $user->email_verified_at = now();
        $user->verification_code_hash = null;
        $user->verification_expires_at = null;
        $user->save();

        return redirect()->route('login.admin')->with('status', 'Email verified successfully. You are login.');
    }
}
