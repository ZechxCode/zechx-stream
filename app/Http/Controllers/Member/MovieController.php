<?php

namespace App\Http\Controllers\Member;

use App\Models\UserPremium;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class MovieController extends Controller
{
    public function show($id)
    {
        return view('member.movie-detail');
    }

    public function watch($id)
    {
        $userId = auth()->user()->id;

        $userPremium = UserPremium::where('user_id', $userId)->first();

        $endOfSubscription = $userPremium->end_of_subscription;
        $date = Carbon::createFromFormat('Y-m-d', $endOfSubscription);

        $isValidSubscription = $date->greaterThan(now());

        if ($isValidSubscription) {
            return view('member.movie-watching');
        }

        // if ($userPremium->end_of_subscription >= Carbon::now()) {
        //     return view('member.movie-watching');
        // }
        // dd($userPremium->end_of_subscription, now());

        return redirect()->route('pricing')->withErrors([
            'expired' => 'Kamu Kadaluarsa'
        ]);
    }
}
