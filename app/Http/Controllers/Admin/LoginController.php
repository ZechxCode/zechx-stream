<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\LoginRequest;

class LoginController extends Controller
{
    public function index()
    {
        return view('admin.auth');
    }

    public function authenticate(LoginRequest $loginRequest)
    {
        $credentials = $loginRequest->validated();
        $credentials['role'] = 'admin';
        // dd($credentials);

        if (Auth::attempt($credentials)) {
            $loginRequest->session()->regenerate();

            return redirect()->route('admin.dashboard')->with('success', 'Login Berhasil');
        }

        return back()->withErrors([
            'email' => 'Your credentials are wrong',
        ])->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('admin.login');
    }
}
