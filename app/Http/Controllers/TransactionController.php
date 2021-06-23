<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Transaction;

class TransactionController extends Controller
{
    public function index($id_transaction)
    {
        $transaction = Transaction::find($id_transaction);
        return view('transaction',['transaction'=>$transaction]);
    }
}
