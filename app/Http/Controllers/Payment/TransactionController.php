<?php

namespace App\Http\Controllers\Payment;

use Illuminate\Http\Request;
use App\Services\TripayService;
use App\Http\Controllers\Controller;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function checkout()
    {
        $tripay = new TripayService();
        $channels= $tripay->getPaymentChannels();
        return view('payment.checkout',compact('channels'));
    }
    
    public function store(Request $request)
    {
        dd($request->all());
        $method = $request->method;
        $bill_type_id = $request->bill_type_id;

        $tripay = new TripayService();
        $transaction = $tripay->requestTransaction($method,$bill_type_id);

        // create new data in transaction model
        $user = Auth::user();
        Transaction::create([
            'user_id'=>$user->id,
            'bill_type_id'=>$bill_type_id,
            'reference'=>$transaction->reference,
            'merchant_ref'=>$transaction->merchant_ref,
            'total_amount'=>$transaction->amount,
            'status'=>$transaction->status
        ]);
        
        return redirect()->route('pay.show',['transaction'=>$transaction->reference]);
    }
    public function show($transaction)
    {
        dd($transaction);
    }
}
