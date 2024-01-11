<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginFormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function showLogin()
    {
        return view('login.login_form');
    }

    /** 
    *@param App\Http\Requests\LoginFormRequest $request
    */
    public function login(LoginFormRequest $request)
    {
        //dd($request->all());
        $credentials = $request->only('email', 'password');
        //dd($credentials);

        if (Auth::attempt($credentials)){
            $request->session()->regenerate();

            return redirect('home')->with('login_success', 'ログイン成功しました');
        }

        return back()->withErrors([
            'login_error' => 'メールアドレスかパスワードが間違っています。
            ',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('showLogin');
    }
    
}
