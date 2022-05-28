<?php

namespace App\Http\Livewire;

use App\Models\Student;
use Livewire\Component;

class StudentsComponent extends Component
{
    public function render()
    {
        $students = Student::all();
        return view('livewire.students-component', compact('students'))->layout('livewire.layout.base');
    }
}
