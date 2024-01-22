<?php

namespace App\Http\Controllers\Admin;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TransactionController extends Controller
{
    public function index()
    {
        // $relations = [
        //     'package',
        //     'user',
        // ];
        // $transactions = Transaction::with($relations)->get();

        $transactions = Transaction::all();

        // dd($transactions);

        return view('admin.transactions', compact('transactions'));
    }
}
