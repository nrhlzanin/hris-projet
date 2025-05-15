<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.sign-in');
    }

    public function showLoginFormId()
    {
        return view('auth.sign-in-id');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Arahkan berdasarkan is_admin
            if ($user->is_admin) {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('user.dashboard');
            }
        }

        return back()->withErrors(['email' => 'Login gagal. Periksa email dan password.']);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('sign.in');
    }
}
