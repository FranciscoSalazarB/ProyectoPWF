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

    public function entregado($id_transaction)
    {
        $transaction = Transaction::find($id_transaction);
        $transaction->entregado = TRUE;
        $transaction->save();
        return redirect()->route('transaction',$id_transaction);
    }

    public function confirmado($id_transaction)
    {
        $transaction = Transaction::find($id_transaction);
        $transaction->confirmado = TRUE;
        $transaction->save();
        return redirect()->route('transaction',$id_transaction);
    }

    public function comprobante($id_transaction, Request $req)
    {
        $transaction = Transaction::find($id_transaction);
        if ($req->hasFile('comprobante')) {
            $file = $req->file('comprobante');
            $destino = 'comprobantes/';
            $fileName = time().'-'.$file->getClientOriginalName();
            $uploadSucess = $req->file('comprobante')->move($destino,$fileName);
            $transaction->comprobante = $destino.$fileName;
        }
        $transaction->save();
        return redirect()->route('transaction',$id_transaction);
    }
}
