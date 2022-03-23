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
        
        $method = $request->method;
        $bill_type_id = $request->bill_type_id;
        $user = Auth::user();
        
        if($method=='tunaicash'){ 
            $reference = 'MBKD-'.time();
            $this->storeToDatabase($bill_type_id,$user,$reference);
            return redirect()->route('pay.detail', ['reference'=>$reference]);
        }else{
            $tripay = new TripayService();
            $transaction = $tripay->requestTransaction($method);
            
            Transaction::create([
                'user_id'=>$user->id,
                'bill_type_id'=>$bill_type_id,
                'reference'=>$transaction->reference,
                'merchant_ref'=>$transaction->merchant_ref,
                'total_amount'=>$transaction->amount,
                'status'=>$transaction->status
            ]);
            return redirect()->route('pay.detail', ['reference'=>$transaction->reference]);
        }
    }
    public function show($reference){   
        $transaksi = Transaction::where('reference',$reference)->first();
        if($transaksi->is_cash==true){            
            $transaction = [
                'reference' => $transaksi->reference, 
                'merchant_ref' => $transaksi->merchant_reff, 
                'payment_method' => 'TUNAI', 
                'payment_name' => 'Tunai', 
                'customer_name' => Auth::user()->name, 
                'customer_email' => Auth::user()->email, 
                'customer_phone' => Auth::user()->student->family->a_phone, 
                // 'callback_url' => null, 
                // 'return_url' => null, 
                'amount' => 450000, 
                'fee_merchant' => 0, 
                'fee_customer' => 0, 
                'total_fee' => 450000, 
                'status' => 'UNPAID', 
                'paid_at' => null, 
                'expired_time' => null, 
                'order_items' => collect([
                    (object)[
                        "name" => "Pendaftaran", 
                        "price" => 450000, 
                        "quantity" => 1, 
                        "subtotal" => 450000, 
                        "product_url" => null, 
                        "image_url" => null 
                    ], 
                ]), 
                "instructions" => collect([
                    (object)[
                        "title" => "Internet Banking", 
                        "steps" => [
                            "Login ke internet banking Bank BRI Anda", 
                            "Pilih menu <b>Pembayaran</b> lalu klik menu <b>BRIVA</b>", 
                            "Pilih rekening sumber dan masukkan Kode Bayar (<b>291198618420086</b>) lalu klik <b>Kirim</b>", 
                            "Detail transaksi akan ditampilkan, pastikan data sudah sesuai", 
                            "Masukkan nominal pembayaran", 
                            "Klik <b>Lanjutkan</b>", 
                            "Masukkan kata sandi ibanking lalu klik <b>Request</b> untuk mengirim m-PIN ke nomor HP Anda", 
                            "Periksa HP Anda dan masukkan m-PIN yang diterima lalu klik <b>Kirim</b>", 
                            "Transaksi sukses, simpan bukti transaksi Anda" 
                        ], 
                    ], 
                ]),
            ];
            $transaction = (object) $transaction;
            return view('payment.show', compact('transaction'));
        }else{
            $tripay = new TripayService();
            $transaction = $tripay->detail($reference);
            // dd($transaction);
            return view('payment.show', compact('transaction'));
        }
    }
    public function storeToDatabase($bill_type_id,$user,$reference)
    {
        $merchant_ref = 'REG'.time();
        $amount = 450000;
        Transaction::create([
            'user_id'=>$user->id,
            'bill_type_id'=>$bill_type_id,
            'reference'=>$reference,
            'merchant_ref'=>$merchant_ref,
            'total_amount'=>$amount,
            'is_cash'=>true,
        ]);
    }
}
