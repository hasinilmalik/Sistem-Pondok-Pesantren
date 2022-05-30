<?php

namespace App\Http\Livewire;

use App\Models\FormalInstitution;
use App\Models\MadinInstitution;
use Livewire\Component;

class ChooseMadin extends Component
{
    public function render()
    {
        $madin = MadinInstitution::get();
        $formal = FormalInstitution::get();
        return view('livewire.choose-madin',compact('madin','formal'));
    }
}
