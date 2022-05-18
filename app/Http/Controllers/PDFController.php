<?php

namespace App\Http\Controllers;

use App\Models\Student;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\Auth;

class PDFController extends Controller
{
    public function biodata($id)
    {
        $data = Student::findOrFail($id);
        $pdf = PDF::loadView('pdf.biodata', compact('data'));
        if(Auth::user()->hasRole('admin') || Auth::user()->hasRole('superadmin')){
            return $pdf->stream();
        }else{
            return $pdf->download('bio-'.$data->nama.'.pdf');
        }
    }
    public function mou($id)
    {
        $data = Student::findOrFail($id);
        $pdf = PDF::loadView('pdf.mou', compact('data'));
        if(Auth::user()->hasRole('admin') || Auth::user()->hasRole('superadmin')){
            return $pdf->stream();
        }else{
            return $pdf->download('mou-'.$data->nama.'.pdf');
        }
    }
}
