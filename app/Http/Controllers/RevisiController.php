<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Addition;
use Illuminate\Http\Request;
use App\Models\MadinInstitution;
use App\Models\FormalInstitution;

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
    // mengisi madin_institution_id yang ada pada tb_students
    public function isiMadinNull()
    {
        return  Student::where('madin_institution_id',null)->update([
            'madin_institution_id' => 1
        ]);
    }
    public function revisiSantriLama()
    {
        Student::whereDate('id','<',2000)->update(['created_at' => '2020-01-01 00:00:00']);
    }
    public function revisiFormal()
    {
        $students = Student::get();
        foreach ($students as $student) {
            $formal = $student->addition->lembaga_formal;
            if($formal){     
                $inst = FormalInstitution::where('name','LIKE','%'.$formal.'%')->first();
                if($inst){
                    Student::find($student->id)->update(['fromal_institution_id' => $inst->id]);
                }
            }
        }
        return 'done';
    }
}