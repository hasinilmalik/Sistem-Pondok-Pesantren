<?php

namespace App\Http\Livewire;

use App\Models\Dormitory;
use Livewire\Component;

class ChooseDormitory extends Component
{
    public $selectedJk;
    public $selectedDaerah;
    public $dormitories;
    public $asrama;
    public function render()
    {
     
        return view('livewire.choose-dormitory');
    }
    public function updatedSelectedJk()
    {
        $this->dormitories = Dormitory::where('gender', 'LIKE','%'.$this->selectedJk.'%')->get();
    }
    public function updatedSelectedDaerah($dormitory_id)
    {
        $jml = Dormitory::where('id', $dormitory_id)->first()->rooms;
        $this->asrama = $jml;
    }
}
