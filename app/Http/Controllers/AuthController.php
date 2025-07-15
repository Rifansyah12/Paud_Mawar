<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Redirect sesuai role
            return match ($user->role) {
                'admin' => redirect()->intended('/admin/dashboard'),
                'pengelola' => redirect()->intended('/pengelola/dashboard'),
                default => abort(403, 'Role tidak dikenali'),
            };
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }



    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}

