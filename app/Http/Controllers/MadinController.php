<?php

namespace App\Http\Controllers;

use App\Models\MadinMapel;
use App\Models\Student;
use Inertia\Inertia;
use Illuminate\Http\Request;

class MadinController extends Controller
{
    public function index()
    {
        $students = Student::select('nama', 'created_at')
        ->with('madin_institution')->get();
        return Inertia::render('Madin/Index',[
            'students'=>$students
        ]);
    }
    public function mapel()
    {
        return Inertia::render('Madin/MapelIndex',[
            'title'=>'Santri Madin',
            'mapels'=>MadinMapel::all()
        ]);
    }
}
