<?php

namespace App\Http\Controllers\Payment;

use Carbon\Carbon;
use App\Models\User;
use App\Models\BillType;
use App\Models\Transaction;
use App\Services\WaService;
use Illuminate\Http\Request;
use App\Services\TripayService;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class TransactionController extends Controller
{
    public function checkout()
    {
        //uncomment jika mau pakai virtual lagi
        // $tripay = new TripayService();
        // $channels= $tripay->getPaymentChannels();
        $bill_types = BillType::whereIn('id', [1, 5, 6])->get();
        return view('payment.checkout',compact('bill_types'));
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
                $transaction = $tripay->requestTransaction($method,$bill);
                
                Transaction::create([
                    'user_id'=>$user->id,
                    'bill_type_id'=>$bill_type_id,
                    'reference'=>$transaction->reference,
                    'merchant_ref'=>$transaction->merchant_ref,
                    'total_amount'=>$transaction->amount,
                    'status'=>$transaction->status
                ]);
                
                $wa = new WaService();
                $nohp = $user->student->family->a_phone;
                $nohp2 = $user->student->family->i_phone;
                $wa->infoBayar($nohp,$transaction);
                $wa->infoBayar($nohp2,$transaction);
                return redirect()->route('pay.detail', ['reference'=>$transaction->reference]);
            }
        }else{
            return back()->with('error','Bill type not found');
        }
    }
    public function storeViaAdmin(Request $request)
    {
        $u = User::where('email',$request->email)->first();
        if(!isset($u)){
            return back()->with('error','User not found');
        }else{
            $merchant_ref = 'REG'.time();
            $trx = Transaction::create([
                'user_id'=>$u->id,
                'bill_type_id'=>$request->bill_type_id,
                'reference'=>'MBKD-'.time(),
                'merchant_ref'=>$merchant_ref,
                'total_amount'=>$request->amount,
                'is_cash'=>true,
                'status'=>$request->status,
            ]);

            $wa = new WaService();
            $nohp = $u->student->family->a_phone;
            $nohp2 = $u->student->family->i_phone;

            if($request->status=='paid'){
                $s = 'Lunas';
                $amount=$request->amount;
            }else{
                $s = 'Belum Lunas';
                $amount = 0;
            }
            
                $nama=$u->student->nama;
                $status=$s;
                $link = 'https://sip.mubakid.or.id/nota/'.$trx->reference;
        
            $wa->kirimNota($nohp,$nama,$amount,$status, $link);

            return redirect()->route('students.index','baru')->with('success','Pembayaran berhasil diterapkan');
        }
    }
    
    public function show($reference){   
        $transaksi = Transaction::where('reference',$reference)->first();
        $bill_type_id = $transaksi->bill_type_id;
        if($transaksi->is_cash==true){            
            $transaction = $this->_cashSteps($bill_type_id, $transaksi);
            $transaction = (object) $transaction;
            return view('payment.show', compact('transaction'));
        }else{
            $tripay = new TripayService();
            $transaction = $tripay->detail($reference);
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
    public function _cashSteps($id, $transaksi)
    {
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
            'amount' => $transaksi->total_amount, 
            'fee_merchant' => 0, 
            'fee_customer' => 0, 
            'total_fee' => $transaksi->total_amount, 
            'status' => 'UNPAID', 
            'paid_at' => null, 
            'expired_time' => null, 
            'order_items' => collect([
                (object)[
                    "name" => "Pendaftaran", 
                    "price" => $transaksi->total_amount, 
                    "quantity" => 1, 
                    "subtotal" => $transaksi->total_amount, 
                    "product_url" => null, 
                    "image_url" => null 
                ], 
            ]), 
            "instructions" => collect([
                (object)[
                    "title" => "Tunai", 
                    "steps" => [
                        "Mendatangi kantor kami di Pondok pesantren PP Miftahul Ulum Banyuputih Kidul Lumajang", 
                        "Berikan Kode beserta uang tunai kepada Petugas",
                        "Kami akan memberikan bukti pembayaran berupa Nota/struk atau",
                        "Kami akan mengirimkan bukti pembayaran ke email/wa anda",
                        "Transaksi sukses, simpan bukti transaksi Anda" 
                    ], 
                ], 
            ]),
        ];
        return $transaction;
    }
    public function isCreateBill()
    {
        $bill_type_id = BillType::where('name','pendaftaran')->first()->id;
        $bill = Transaction::where('user_id',Auth::user()->id)
        ->where('bill_type_id',$bill_type_id)
        ->latest()->first();
        if($bill==null){
            return false;
        }else{
            return true;
        }
    }
    public function isPaid($bill_type_id){
        $transaksi = Transaction::where('bill_type_id',$bill_type_id)
        ->where('user_id',Auth::user()->id)
        ->where('status','PAID')
        ->first();
        if($transaksi==null){
            return false;
        }else{
            return $transaksi;
        }
    }
    public function checkReference($bill_type_id)
    {
        $reference = Auth::user()->transactions
        ->where('status','unpaid')
        ->where('bill_type_id',$bill_type_id)
        ->first();
        return $reference;
    }
    public function changeMethod($reference)
    {
        // sebelum mengubah pastikan dulu, bahwa ia belum membayar
        if($this->checkStatus($reference)=='unpaid'){
            //hapus methode lama
            Transaction::where('reference',$reference)->delete();
            return redirect()->route('pay.checkout','pendaftaran');
        }
    }
    public function checkStatus($reference)
    {
        $transaksi = Transaction::where('reference',$reference)->first();
        return $transaksi->status;
    }
    public function daftarTransaksi($method)
    {
        if($method=='offline'){
            $transactions = 'offline';
        }else{
            $tripay = new TripayService();
            $transactions = $tripay->daftarTransaksi();
        }
        return view('payment.list', compact('transactions'));
    }
    
    public function invoice($reference)
    {
        $trx = Transaction::where('reference',$reference)->first();
        $products = Product::where('bill_type_id',$trx->bill_type_id)->get();
        $total = $products->sum('amount');
        return view('pdf.nota',compact('trx','products','total'));
    }
}
