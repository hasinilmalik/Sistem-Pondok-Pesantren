<?php

namespace App\Exports;

use App\Models\Student;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;


class ExportStudents implements FromView
{
    public function view(): View
    {
        $students = Student::with('madin_institution')->get();
        dd($students);
        return view('export.students',compact('students'));
    }
}
