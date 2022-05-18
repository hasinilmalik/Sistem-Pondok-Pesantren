<?php

namespace App\Http\Livewire\Ui;

use Illuminate\Support\Facades\Http;
use Livewire\Component;

class PilihAlamat extends Component
{
    public $selectedProvinsi = null;
    public $selectedKota = null;
    public $selectedKecamatan = null;
    public $kota = null;
    public $kecamatan = null;
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
    public function updatedSelectedKota($kota_id)
    {
        $response = Http::get('https://emsifa.github.io/api-wilayah-indonesia/api/districts/'.$kota_id.'.json');
        $this->kecamatan = json_decode($response->body());
    }
   
}
