<?php

namespace App\Http\Controllers;

use App\Models\Family;
use App\Models\Student;
use App\Models\Addition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuestController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'nik' => 'unique:students',
            'user_id' => 'unique:students',
        ],[
            'user_id.unique'=>'Maaf! Akun anda telah terdaftar'
        ]);
   
        $data = $request->all();
        $student_id = Student::create($data);
        Family::create([
            'student_id'=>$student_id->id,
            'a_kk'=>$request['a_kk'],
            'a_nik'=>$request['a_nik'],
            'a_nama'=>$request['a_nama'],
            'a_pekerjaan'=>$request['a_pekerjaan'],
            'a_pendidikan'=>$request['a_pendidikan'],
            'a_phone'=>$request['a_phone'],
            'a_penghasilan'=>$request['a_penghasilan'],
            'i_nik'=>$request['i_nik'],
            'i_nama'=>$request['i_nama'],
            'i_pekerjaan'=>$request['i_pekerjaan'],
            'i_pendidikan'=>$request['i_pendidikan'],
            'i_phone'=>$request['i_phone'],
            'w_hubungan_wali'=>$request['w_hubungan_wali'],
            'w_nik'=>$request['w_nik'],
            'w_nama'=>$request['w_nama'],
            'w_pekerjaan'=>$request['w_pekerjaan'],
            'w_penghasilan'=>$request['w_penghasilan'],
        ]);
        
        Addition::create([
            'student_id'=>$student_id->id,
            'nism'=>$request['nism'],
            'kip'=>$request['kip'],
            'pkh'=>$request['pkh'],
            'kks'=>$request['kks'],
            'agama'=>$request['agama'],
            'hobi'=>$request['hobi'],
            'cita_cita'=>$request['cita_cita'],
            'kewarganegaraan'=>$request['kewarganegaraan'],
            'kebutuhan_khusus'=>$request['kebutuhan_khusus'],
            'status_rumah'=>$request['status_rumah'],
            'status_mukim'=>$request['status_mukim'],
            'lembaga_formal'=>$request['lembaga_formal'],
            'madin'=>$request['madin'],
            'sekolah_asal'=>$request['sekolah_asal'],
            'alamat_sekolah_asal'=>$request['alamat_sekolah_asal'],
            'npsn_sekolah_asal'=>$request['npsn_sekolah_asal'],
            'nsm_sekolah_asal'=>$request['nsm_sekolah_asal'],
            'no_ijazah'=>$request['no_ijazah'],
            'no_un'=>$request['no_un'],
        ]);
        return redirect()->route('home');
    }
}
