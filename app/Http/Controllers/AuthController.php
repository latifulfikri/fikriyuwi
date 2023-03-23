<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $user = [
            'username' => $request->username,
            'password' => $request->password
        ];

        if(Auth::attempt($user)) {
            $request->session()->regenerate();
            return redirect()->intended('owner');
        }

        return back()->with([
            'message-type' => 'warning',
            'message' => 'The provided credentials do not match our records.'
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
