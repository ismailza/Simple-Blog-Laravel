<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login () {
        return view('auth.login');
    }

    public function authentificate (LoginRequest $request) {
        $credentials = $request->validated();
        // Check if the "Remember Me" checkbox is checked
        $remember = $request->has('remember');
        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();
            return redirect()->intended(route('blog.index'));
        }
        return to_route('auth.login')->with('error', "Email or Password is wrong!");
    }

    public function logout () {
        Auth::logout();
        return to_route('auth.login');
    }
}
