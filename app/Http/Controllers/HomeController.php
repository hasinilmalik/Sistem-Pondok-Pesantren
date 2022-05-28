<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Payment\TransactionController;
use App\Models\Student;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $profil = $this->cekFoto();
        $jumlah = $this->cekJumlahSantri();
        if($this->_isAdmin()==true){
            return view('home',compact('profil','jumlah'));
        }else{
            $isNew = $this->isNewStudent();
            // jika dia santri baru
            if($isNew){
                //cek pendaftarannya sdh lunas atau belum
                $trans = new TransactionController();
                // cek apakah sdh buat methode pembayaran
                $isBill = $trans->isCreateBill();
                if($isBill==true){
                    // jika sudah buat tagihan
                    // cek apa sdh bayar
                    $isPaid = $trans->isPaid(1);
                    // jika sudah bayar
                    if($isPaid==true){
                        $link = 'kosong';
                        // Maka kosongkan penagihan
                    }else{
                        // cek kode tagihan
                        $link = $trans->checkReference(1)->reference;
                    }
                }else{
                    // jika belum buat tagihan
                    // link baru adalah buat tagihan
                    $link = 'baru';
                }
                // kode 1 adalah untuk pendaftaran
                
            }else{ //jika dia bukan santri baru
            }
            return view('home',compact('profil','jumlah','link'));
        }
    }
    public function cekFoto()
    {
        $student = Auth::user()->student;
        if ($student == null) {
            $profil = 'user.jpeg';
        } else {
            $foto = $student->foto;
            if ($foto == null) {
                $profil = 'user.jpeg';
            } else {
                $profil = $foto;
            }
        }
        return $profil;
    }
    public function cekJumlahSantri()
    {
        $jumlah_putri = Student::where('jenis_kelamin','perempuan')->where('status','!=','alumni')->count();
        $jumlah_putra = Student::where('jenis_kelamin','laki-laki')->where('status','!=','alumni')->count();
        $alumni = Student::where('status','alumni')->count();
        $baru = Student::whereYear('created_at', date('Y'))->count();
        $total_santri = Student::where('status','!=','alumni')->count();
        $jumlah = [
            'jumlah_putri' => $jumlah_putri,
            'jumlah_putra' => $jumlah_putra,
            'alumni' => $alumni,
            'baru' => $baru,
            'total_santri' => $total_santri
        ];
        return $jumlah;
    }
    public function isNewStudent()
    {
        $student = Auth::user()->student->status;
        if ($student == 'baru') {
            $isNewStudent = true;
        } else {
            $isNewStudent = false;
        }
        return $isNewStudent;
    }
    public function _isAdmin()
    {
        $role = Auth::user()->HasRole('super admin|admin');
        return $role;
    }
}
