<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
    * Create a new controller instance.
    *
    * @return void
    */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
    * Show the application dashboard.
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */
    public function index()
    {
        $profil = $this->cekFoto();
        $jumlah = $this->cekJumlahSantri();
        $tagihan = $this->cekTagihan();
        return view('home',compact('jumlah','profil','tagihan'));
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
        $jumlah_putri = Student::where('jenis_kelamin','perempuan')->count();
        $jumlah_putra = Student::where('jenis_kelamin','laki-laki')->count();
        $alumni = Student::where('status','alumni')->count();
        $jumlah = [
            'jumlah_putri' => $jumlah_putri,
            'jumlah_putra' => $jumlah_putra,
            'alumni' => $alumni
        ];
        return $jumlah;
    }
    public function cekTagihan()
    {
        $cek_tagihan = Transaction::where('user_id',Auth::user()->id)->where('status','paid')->latest()->first();
        if ($cek_tagihan==null) {
            $tagihan = true;
        }else{
            $tagihan = false;
        }
        return $tagihan;
    }
}
