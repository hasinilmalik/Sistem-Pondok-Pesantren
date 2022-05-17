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
       
            return $pdf->stream();
     
    }
    public function mou($id)
    {
        $data = Student::findOrFail($id);
        $pdf = PDF::loadView('pdf.mou', compact('data'));
        // return $pdf->stream('filename.pdf');
        return $pdf->download('mou-'.$data->nama.'.pdf');    
    }
}
