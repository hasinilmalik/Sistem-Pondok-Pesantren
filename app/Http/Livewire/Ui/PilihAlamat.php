<?php

namespace App\Http\Livewire\Ui;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class PilihAlamat extends Component
{
    public $selectedProvinsi=0;
    public $selectedKota=0;
    public $selectedKecamatan=0;
    public $kota;
    public $kecamatan;
    public $desa = [];

    public function render()
    {
        $response = Http::get('https://emsifa.github.io/api-wilayah-indonesia/api/provinces.json');
        $prov = json_decode($response->body());
        return view('livewire.ui.pilih-alamat',compact('prov'));
    }
    public function updatedSelectedProvinsi($provinsi_id)
    {
        $response = Http::get('https://emsifa.github.io/api-wilayah-indonesia/api/regencies/'.$provinsi_id.'.json');
        $this->kota = json_decode($response->body());
    }
    // public function updatedSelectedKota($kota_id)
    // {
    //     $response = Http::get('https://emsifa.github.io/api-wilayah-indonesia/api/districts/'.$kota_id.'.json');
    //     $k = json_decode($response->body());
    //     $this->kecamatan = $k;
    // }
    // public function updatedSelectedKecamatan($kecamatan_id)
    // {
    //     $response = Http::get('https://emsifa.github.io/api-wilayah-indonesia/api/village/'.$kecamatan_id.'.json');
    //     $this->desa = json_decode($response->body());
    // }
   
}
