<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Socialite\Facades\Socialite;

class RegisterController extends Controller
{
    // Tampilkan form Sign Up
    public function showSignUpForm()
    {
        return view('auth.sign-in');
    }

    // Proses Sign Up
    public function register(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'is_admin' => false, // Pastikan kolom is_admin diisi
        ]);

        return redirect()->route('sign.in')->with('success', 'Account created successfully!');
    }

    // Redirect ke Google untuk Sign Up
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // Callback dari Google
    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->stateless()->user();

        // Cek apakah user sudah ada
        $user = User::where('email', $googleUser->getEmail())->first();

        if (!$user) {
            // Buat user baru jika belum ada
            $user = User::create([
                'first_name' => $googleUser->user['given_name'] ?? '',
                'last_name' => $googleUser->user['family_name'] ?? '',
                'email' => $googleUser->getEmail(),
                'password' => Hash::make(uniqid()), // Password random
                'is_admin' => false,
            ]);
        }

        // Login user
        auth()->login($user);

        return redirect()->route('dashboard')->with('success', 'Logged in with Google!');
    }
}
