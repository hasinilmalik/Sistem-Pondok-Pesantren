<?php

namespace App\Http\Livewire;

use App\Models\Dormitory;
use Livewire\Component;

class ChooseDormitory extends Component
{
    public $selectedDaerah;
    public $asrama;
    public function render()
    {
        $dormitories = Dormitory::all();
        return view('livewire.choose-dormitory', compact('dormitories'));
    }
    public function updatedSelectedDaerah($daerah_id)
    {
        $jml = Dormitory::where('id', $daerah_id)->first()->rooms;
        $this->asrama = $jml;
    }
}
