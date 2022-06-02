<?php

namespace App\Http\Livewire\Ui;

use App\Services\WaService;
use Livewire\Component;

class CekWa extends Component
{
    public $wa1=null;
    public $wa2=null;
    public function cekWa()
    {
        $wa = new WaService();
        $this->wa1 = $wa->cekOn('6285158762445');
        $this->wa2 = $wa->cekOn('6285333920007');
    }
    public function render()
    {
        return view('livewire.ui.cek-wa');
    }
}
