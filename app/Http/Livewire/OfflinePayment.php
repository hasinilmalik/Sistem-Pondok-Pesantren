<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Transaction;
use Livewire\WithPagination;
use RealRashid\SweetAlert\Facades\Alert;

class OfflinePayment extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $message='OK';
    public $cari='';

    public function render()
    {
        $transactions = Transaction::where('is_cash',true)
        ->where('reference','like','%'.$this->cari.'%')
        ->orderBy('created_at','desc')
        ->paginate(3);
        return view('livewire.offline-payment',compact('transactions'));
    }
    public function bayar($id)
    {
        Transaction::find($id)->update(['status'=>'paid']);
        Alert::success('Success','Pembayaran Berhasil');
    }
    public function cancel($id)
    {
        $this->message = 'YA';
        Transaction::find($id)->update(['status'=>'unpaid']);
        Alert::success('Success','Pembayaran Dibatalkan');
    }
    public function updatingCari()
    {
        $this->resetPage();
    }
}
