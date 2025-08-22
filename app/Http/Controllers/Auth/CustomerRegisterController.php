<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Mail\VerificationCodeMail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Support\Str;
use Carbon\Carbon;

class CustomerRegisterController extends Controller
{
    public function showForm()
    {
        return view('auth.customer-register');
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'first_name' => ['required','string','max:100'],
            'last_name'  => ['required','string','max:100'],
            'email'      => ['required','email','max:255','unique:users,email'],
            'password'   => ['required', Password::min(8)],
        ]);

        $user = User::create([
            'first_name' => $data['first_name'],
            'last_name'  => $data['last_name'],
            'email'      => $data['email'],
            'password'   => $data['password'],
            'role'       => 'customer',
        ]);

        // Generate 6-digit code
        $code = (string) random_int(100000, 999999);
        $user->verification_code_hash   = Hash::make($code);
        $user->verification_expires_at  = Carbon::now()->addMinutes(15);
        $user->save();

        Mail::to($user->email)->send(new VerificationCodeMail($code));

        // Redirect to code entry page with email prefilled
        return redirect()->route('verify.show', ['email' => $user->email])
            ->with('status', 'We emailed you a verification code. Please enter it below.');
    }
}
