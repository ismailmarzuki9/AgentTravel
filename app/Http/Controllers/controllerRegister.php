<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class controllerRegister extends Controller
{
    //
    public function register()
    {
        return view('auth.register');
    }

    public function regiserCek(Request $request)
    {

         // Validasi input
         $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'email_verified_at' => 'required|string|email|max:255|unique:users',
            'role_user' => 'required|in:member,driver',
            'password' => 'required|string|min:8|confirmed',

        ]);

        // dd($validated['email_verified_at']);
        // Simpan data pengguna
        User::create([
            'id' =>(string) Str::uuid(),
            'name' => $validated['name'],
            'email' => $validated['email'],
            'email_verified_at' => $validated['email_verified_at'],
            'role_user' => $validated['role_user'],
            'password' => Hash::make($validated['password']),
            // 'password' => $validated['password'],
        ]);

         // Redirect setelah registrasi
         return redirect()->route('login')->with('success', 'Registrasi berhasil, silakan login.');

    }

    public function changepasswordview(){
        $user = Auth::user();
        // CEK APAKAH USER TERSEBUT TELAH TERDAFTAR
        return view ('auth.passwords.reset',compact('user'));
    }

    public function changepasswordCek(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'new_password' => 'required|min:8|confirmed',
        ]);

        $email = $request->input('email'); // Mendapatkan email dari parameter query

        // dd($email);
        if (!$email) {
            return Redirect::back()->with('error', 'Email diperlukan untuk mengatur ulang kata sandi.');
        }

        // Periksa apakah email terdaftar di database
        $user = User::where('email', $email)->first();
        // $user = User::where('email', $request->input('email'))->first();

        if (!$user) {
            return redirect()->route('login')->with('error', 'Email tidak ditemukan.');
            // Kirim data ke view
            return view('auth.passwords.reset', compact('user'));
        }else
        {
            $user->update([ // cek kenapa tutorialpakai AUth::user???????
                'password' =>Hash::make($request->input('new_password')),
            ]);
                $request->session()->flash('message', "sukses change password");
                return redirect()->route('login');
        }

    }

}
