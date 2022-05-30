<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\ExportStudents;
use Maatwebsite\Excel\Facades\Excel;


class ExportController extends Controller
{
    public function students($type)
    {
        $exc = new ExportStudents();
        return Excel::download($exc, 'Santri.xlsx');
    }
}
