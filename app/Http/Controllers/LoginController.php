<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class LoginController extends Controller
{
    public function view()
    {
        return view('login.Login');
    }
    public function authenticate(Request $request): RedirectResponse
    {
        $attributes = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt($attributes)) {
            session()->regenerate();
            return redirect()->intended('dashboard')->with(['message' => 'You are logged in.']);
        } else {

            return back()->withErrors(['email' => 'Email or password invalid.']);
        }
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Berhasil Logout ');
    }


}
