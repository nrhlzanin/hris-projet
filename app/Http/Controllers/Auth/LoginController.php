<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

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

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->stateless()->user();

        // Temukan user berdasarkan email, jika tidak ada, buat baru
        $user = User::firstOrCreate(
            ['email' => $googleUser->getEmail()],
            [
                'name' => $googleUser->getName(),
                'password' => bcrypt(uniqid()), // password random
            ]
        );

        Auth::login($user, true);

        // Redirect ke dashboard atau halaman lain
        return redirect()->intended('/'); // ganti sesuai kebutuhan
    }

    public function loginWithId(Request $request)
    {
        $request->validate([
            'nik' => 'required',
            'password' => 'required',
        ]);

        // Cari user berdasarkan NIK
        $user = \App\Models\User::where('nik', $request->nik)->first();

        if ($user && \Hash::check($request->password, $user->password)) {
            \Auth::login($user, $request->filled('remember'));

            // Arahkan berdasarkan is_admin
            if ($user->is_admin) {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('user.dashboard');
            }
        }

        return back()->withErrors(['nik' => 'Login gagal. Periksa NIK dan password.']);
    }
}
