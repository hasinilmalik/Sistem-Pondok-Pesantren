<?php

namespace App\Http\Controllers\Payment;

use Illuminate\Http\Request;
use App\Services\TripayService;
use App\Http\Controllers\Controller;
use App\Models\BillType;
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
        // dd($request->all());
        $method = $request->method;
        $bill = BillType::where('name',$request->bill_type_id)->first();
        if($bill!=null){
            $bill_type_id = $bill->id;
            $amount = $bill->amount;
            $user = Auth::user();
            // dd($amount);
            if($method=='tunaicash'){ 
                $reference = 'MBKD-'.time();
                $this->storeToDatabase($bill_type_id,$user,$reference,$amount);
                return redirect()->route('pay.detail', ['reference'=>$reference]);
            }else{
                $tripay = new TripayService();
                $transaction = $tripay->requestTransaction($method,$amount);
                
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
        }else{
            return back()->with('error','Bill type not found');
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
                        "title" => "Tunai", 
                        "steps" => [
                            "Mendatangi kantor kami di Pondok pesantren PP Mubakid", 
                            "Berikan uang tunai kepada Petugas kami",
                            "Kami akan memberikan bukti pembayaran berupa Nota/struk atau",
                            "Kami akan mengirimkan bukti pembayaran ke email/wa anda",
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
    public function storeToDatabase($bill_type_id,$user,$reference,$amount)
    {
        $merchant_ref = 'REG'.time();
        Transaction::create([
            'user_id'=>$user->id,
            'bill_type_id'=>$bill_type_id,
            'reference'=>$reference,
            'merchant_ref'=>$merchant_ref,
            'total_amount'=>$amount,
            'is_cash'=>true,
        ]);
    }
    public function guestBills()
    {
        $bill_type_id = BillType::where('name','pendaftaran')->first()->id;
        $bills = Transaction::where('user_id',Auth::user()->id)
        ->where('bill_type_id',$bill_type_id)
        ->latest()->first();
        return redirect()->route('pay.detail', ['reference'=>$bills->reference]);
    }
}
