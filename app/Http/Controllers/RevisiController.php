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
        $students = Addition::where('madin','')->get();
        foreach ($students as $student) {
            // Addition::find($student->student_id)->update(['madin_institution_id' => 11]);
            Student::find($student->student_id)->update(['madin_institution_id' => 11]);
        }
    }
    public function revisiMadin()
    {
        $students = Student::get();
        foreach ($students as $student) {
            $madin = $student->addition->madin;
            if(!is_null($madin)){     
                $id = MadinInstitution::where('name','LIKE','%'.$madin.'%')->first()->id;
                if(!is_null($id)){
                    Student::find($student->id)->update(['madin_institution_id' => $id]);
                }
            }
            
        }
        return 'done';
    }
   
}