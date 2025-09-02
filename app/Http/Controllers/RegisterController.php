<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Session;

class RegisterController extends Controller
{
    public function register() {
        return view('register');
    }

    public function actionregister(Request $request) {
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'username' => 'required|unique:users,username',
            'password' => 'required|min:4',
            'role' => 'required',
        ]);

        Session::flash('message', 'Register Berhasil. Akun Anda sudah aktif, silahkan Login menggunakan username dan password.');
        return redirect('login');
    }
}
