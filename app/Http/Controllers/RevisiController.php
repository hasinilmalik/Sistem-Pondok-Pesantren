<?php

namespace App\Http\Controllers;

use App\Models\Addition;
use App\Models\MadinInstitution;
use App\Models\Student;
use Illuminate\Http\Request;

class RevisiController extends Controller
{
    public function isiMadin()
    {
        $students = Addition::where('madin',null)->get();
        foreach ($students as $student) {
            Addition::where('student_id',$student->student_id)->update(['madin' => 'Belum diterapkan']);
            Student::find($student->student_id)->update(['madin_institution_id' => 1]);
        }
    }
    public function revisiMadin()
    {
        $students = Student::get();
        foreach ($students as $student) {
            $madin = $student->addition->madin;
            if($madin){     
                $inst = MadinInstitution::where('name','LIKE','%'.$madin.'%')->first();
                if($inst){
                    Student::find($student->id)->update(['madin_institution_id' => $inst->id]);
                }
            }
            
        }
        return 'done';
    }
   
}