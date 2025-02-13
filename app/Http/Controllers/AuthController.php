<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Redirect;
use Symfony\Component\HttpFoundation\RedirectResponse as HttpFoundationRedirectResponse;

class AuthController extends Controller
{
    public function ShowLogin(){
        return view('test.login');
    }

    public function checkLogin(Request $request)
    {
        $credentials = $request->validate([
            'email'=> ['required','email'],
            'password' => ['required'],
        ]);



        if(Auth::attempt($credentials))
        {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }
        return back()->withErrors([
            'email' => 'ไม่มีผู้ใช้นี้'
        ]);
    }

    public function ShowRegister()
    {
        return view('test.register');
    }

    public function RegisterAdd()
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ]);

        $user = User::create(request(['name', 'email', 'password']));

        auth()->login($user);

        return redirect()->to('/');
    }


    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }



}
