<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Addition;
use App\Models\Dormitory;
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
            $formal = $student->addition;
            if($formal!=null){     
                $formal = $student->addition->lembaga_formal;
                $inst = FormalInstitution::where('name','LIKE','%'.$formal.'%')->first();
                if($inst){
                    $ok = Student::find($student->id)->update(['formal_institution_id' => $inst->id]);
                }
            }
        }
        return $ok;
    }
    public function revisiDaerah()
    {
        $students = Student::get();
        foreach ($students as $student) {
            $daerah = $student->daerah;
            $rooms = preg_replace('/[^0-9.]+/', '', $daerah);
            $huruf = substr($daerah,0,1);
            $dormitory_id = Dormitory::where('name',$huruf)
            ->where('gender','LIKE','%'.$student->jenis_kelamin.'%')
            ->first();
            if(isset($dormitory_id)){
                Student::find($student->id)->update([
                    'dormitory_id'=>$dormitory_id->id,
                    'rooms'=>$rooms
                ]);
            };
        }
        return 'ok';
    }
}