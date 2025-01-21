<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Session;

class controllerLogin extends Controller
{
    //
    public function login()
    {
        // if (Auth::check()) {
            return view('auth.login');
        // }
    }

    public function ceklogin(Request $request)
    {
        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];
            // dd($data);
            // $user = User::where('email', $request->input('email'))->first();
            // dd($user);

        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();
            return redirect()->intended('/');

        }else{
            Session::flash('error', 'Email atau Password Salah');
            return redirect('login');
        }
    }

    public function actionlogout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
