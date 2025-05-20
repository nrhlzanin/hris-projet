<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function checkLock()
    {
        return view('user.checklock'); // Pastikan view ini ada
    }

    public function absensi()
    {
        return view('user.absensi'); // Pastikan view ini ada
    }
}
