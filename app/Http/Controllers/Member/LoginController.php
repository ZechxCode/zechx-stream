<?php

namespace App\Http\Controllers\Member;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Member\LoginRequest;

class LoginController extends Controller
{
    public function index()
    {
        return view('member.auth');
    }

    public function auth(LoginRequest $loginRequest)
    {
        $credentials = $loginRequest->validated();
        $credentials['role'] = 'member';
        if (Auth::attempt($credentials)) {
            $loginRequest->session()->regenerate();

            return redirect()->route('member.dashboard');
        }

        return back()->withErrors([
            'credentials' => 'Your credentials are wrong'
        ])->withInput();
    }
}
