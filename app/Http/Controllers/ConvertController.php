<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConvertController extends Controller
{
    public function covertNis($nis)
    {
        //contoh nis
        $nis = 20040001;
        // ambil 2 digit depan (tahun)
        $tahun = substr($nis, 0, 2);
        //ambil 4 digit no urut
        $urutan = substr($nis, 4);
        // gabungkan tahun dan nomer urut
        $hasil = $tahun . $urutan;
        
        return
    }
}
