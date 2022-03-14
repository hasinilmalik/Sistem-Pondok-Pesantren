<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuestController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([

            'nama' => 'required',
        ], [

            'name.required' => 'Nama wajib di isi',
        ]);

        $data = $request->all();
        $data['user_id']=Auth::user()->id;
        Student::create($data);
    }
}
