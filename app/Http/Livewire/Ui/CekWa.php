<?php

namespace App\Http\Livewire\Ui;

use App\Services\WaService;
use Livewire\Component;

class CekWa extends Component
{
    public $wa1=3;
    public $wa2=3;
    public function cekWa()
    {
        $wa = new WaService();
        $this->wa1 = $wa->cekWa('6285333920007');
        $this->wa2 = $wa->cekWa('6285233002598');
        // $this->wa1 = 
    }
    public function render()
    {
        return view('livewire.ui.cek-wa');
    }
}