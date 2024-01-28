<?php

namespace App\Http\Controllers\Member;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Member\RegisterRequest;

class RegisterController extends Controller
{
    public function index()
    {
        return view('member.register');
    }

    public function store(RegisterRequest $registerRequest)
    {
        $payload = $registerRequest->validated();
        $payload['password'] = Hash::make($payload['password']);
        $payload['role'] = 'member';

        User::create($payload);

        return redirect()->route('member.login')->with('success', 'silahkan login');



        // $isEmailExist = User::where('email', $request->email)->exists();

        // if ($isEmailExist) {
        //     return back()->withErrors([
        //         'email' => 'Email sudah terdaftar',
        //     ])->withInput();
        // }

    }
}
