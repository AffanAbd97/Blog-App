<?php

namespace App\Http\Controllers;

use App\Models\Akun;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login()
    {
        // Your code here
        return view('Auth.login');
    }

    public function authorize(Request $request)
    {

        $validated = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('username', 'password');
        $credentials['password'] = sha1('jksdhf832746aiH{}{()&(*&(*' . md5($credentials['password']) . 'HdfevgyDDw{}{}{;;*766&*&*');
        $user = Akun::where('username', $credentials['username'])->first();
        $correctPassword = $credentials['password'] == $user->password;


        if (!$correctPassword) {
            return back()->withErrors([
                'username' => 'Password Tidak Benar!',
            ])->onlyInput('username');
        }
        Session::put('user', $user);
        return redirect()->route('home');
    }


    public function logout()
    {
        Session::forget('user');

        return redirect()->route('login');

    }
}

