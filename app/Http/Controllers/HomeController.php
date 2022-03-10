<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $jumlah_putri = Student::where('jenis_kelamin','perempuan')->count();
        $jumlah_putra = Student::where('jenis_kelamin','laki-laki')->count();
        $alumni = Student::where('status','alumni')->count();
        return view('home',compact('jumlah_putri','jumlah_putra','alumni'));
    }
}
