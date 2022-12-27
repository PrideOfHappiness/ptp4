<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginPageController extends Controller
{
    public function MahasiswaLogin(){
        return view('auth/loginMahasiswa');
    }

    public function DosenLogin(){
        return view('auth/loginDosen');
    }

    public function AdminLogin(){
        return view('auth/loginAdmin');
    }
}
