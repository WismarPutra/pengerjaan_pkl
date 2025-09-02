<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return redirect('home');
        }
        return view('login');
    } 

    public function actionlogin(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            //return redirect()->intended('home');
            return view(view: 'home'); 
        }

        Session::flash('error', 'Username atau Password salah.');
        return redirect('/');
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);

        
    }

    public function actionlogout() {
        Auth::logout();
        return redirect('/');
    }

    protected function authenticated(Request $request, $user) {
        return redirect()->route('home');
    }

    public function username() {
        return 'username';
    }
}