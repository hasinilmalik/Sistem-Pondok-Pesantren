<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Family;
use App\Models\Student;
use App\Models\Addition;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Imports\StudentImport;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;


class StudentController extends Controller
{
    
    public function index()
    {
        $user = Auth::user();
        if(Auth::user()->roles->first()->name=='super admin'){
            $students = Student::orderBy('user_id','desc')->get();
        }else{
            $students = Student::where('jenis_kelamin', $user->jk)->orderBy('user_id','desc')->get();
        }        
        return view('students.index', compact('students'));
    }
    
    public function create()
    {
        return view('students.create');
    }
    
    
    public function store(StoreStudentRequest $request)
    {
        
        if ($file = $request->file('foto')) {
            $path = 'foto_santri/';
            $fileName_santri   = time() . $file->getClientOriginalName();
            Storage::disk('public')->put($path . $fileName_santri, File::get($file));
            $file_name  = $file->getClientOriginalName();
            $file_type  = $file->getClientOriginalExtension();
            $filePath   = 'storage/'.$path . $fileName_santri;
            $data['foto']=$fileName_santri;
        }
        if ($file = $request->file('foto_wali')) {
            $path = 'foto_wali/';
            $fileName_wali   = time() . $file->getClientOriginalName();
            Storage::disk('public')->put($path . $fileName_wali, File::get($file));
            $file_name  = $file->getClientOriginalName();
            $file_type  = $file->getClientOriginalExtension();
            $filePath   = 'storage/'.$path . $fileName_wali;
            $data['foto_wali']=$fileName_wali;
        }
        
        $data = $request->all();
        //ambil tahun sekarang ex:22
        $year = Carbon::now()->format('y');
        // ambil nis terakhir
        $datanis = Student::orderby('nis','desc')->first()->nis+1;
        // buat nis baru
        $datanis = $year.Str::substr($datanis, 2);
        
        // email
        if($request['email']){
            $email=$request['email'];
        }else{
            $email = $datanis . '@bakid.com';
        }
        // input ke tabel users
        $id = DB::table('users')->insertGetId([
            'email' => $email,
            'name'=>$request['nama'],
            'jk'=>$request['jenis_kelamin'],
            'password'=>bcrypt('12345678')
        ]);
        
        $data['user_id']=$id;
        
        $data['nis']=$datanis;
        
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
        
        
        Alert::success('Berhasil', 'Tambah data santri');
        return redirect()->route('students.index');
    }
    
    /**
    * Display the specified resource.
    *
    * @param  \App\Models\Student  $student
    * @return \Illuminate\Http\Response
    */
    public function show(Student $student)
    {
        $forView = 'show';
        return view('students.edit', compact('student','forView'));
    }
    
    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Student  $student
    * @return \Illuminate\Http\Response
    */
    public function edit(Student $student)
    {
        $forView = 'edit';
        return view('students.edit', compact('student','forView'));
    }
    
    /**
    * Update the specified resource in storage.
    *
    * @param  \App\Http\Requests\UpdateStudentRequest  $request
    * @param  \App\Models\Student  $student
    * @return \Illuminate\Http\Response
    */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        // cara menyimpan bisa juga menggunakan storeAs() atau put()
        $data = $request->all();
        if ($file = $request->file('foto')) {
            $path = 'foto_santri/';
            $fileName_santri   = time() . $file->getClientOriginalName();
            Storage::disk('public')->put($path . $fileName_santri, File::get($file));
            $file_name  = $file->getClientOriginalName();
            $file_type  = $file->getClientOriginalExtension();
            $filePath   = 'storage/'.$path . $fileName_santri;
            $data['foto']=$fileName_santri;
        }
        if ($file = $request->file('foto_wali')) {
            $path = 'foto_wali/';
            $fileName_wali   = time() . $file->getClientOriginalName();
            Storage::disk('public')->put($path . $fileName_wali, File::get($file));
            $file_name  = $file->getClientOriginalName();
            $file_type  = $file->getClientOriginalExtension();
            $filePath   = 'storage/'.$path . $fileName_wali;
            $data['foto_wali']=$fileName_wali;
        }
        // pastikan kalau mau menggunakan findOrFail (gunakan id)
        Student::findOrFail($student->id)->update($data);
        Family::where('student_id',$student->id)->update([
            'a_kk'=>$request->a_kk,
            'a_nik'=>$request->a_nik,
            'a_nama'=>$request->a_nama,
            'a_pekerjaan'=>$request->a_pekerjaan,
            'a_pendidikan'=>$request->a_pendidikan,
            'a_phone'=>$request->a_phone,
            'a_penghasilan'=>$request->a_penghasilan,
            'i_nik'=>$request->i_nik,
            'i_nama'=>$request->i_nama,
            'i_pekerjaan'=>$request->i_pekerjaan,
            'i_pendidikan'=>$request->i_pendidikan,
            'i_phone'=>$request->i_phone,
            'w_hubungan_wali'=>$request->w_hubungan_wali,
            'w_nik'=>$request->w_nik,
            'w_nama'=>$request->w_nama,
            'w_pekerjaan'=>$request->w_pekerjaan,
            'w_penghasilan'=>$request->w_penghasilan,
        ]);
        Addition::where('student_id',$student->id)->update([
            'nism'=>$request->nism,
            'kip'=>$request->kip,
            'pkh'=>$request->pkh,
            'kks'=>$request->kks,
            'agama'=>$request->agama,
            'hobi'=>$request->hobi,
            'cita_cita'=>$request->cita_cita,
            'kewarganegaraan'=>$request->kewarganegaraan,
            'kebutuhan_khusus'=>$request->kebutuhan_khusus,
            'status_rumah'=>$request->status_rumah,
            'status_mukim'=>$request->status_mukim,
            'lembaga_formal'=>$request->lembaga_formal,
            'madin'=>$request->madin,
            'sekolah_asal'=>$request->sekolah_asal,
            'alamat_sekolah_asal'=>$request->alamat_sekolah_asal,
            'npsn_sekolah_asal'=>$request->npsn_sekolah_asal,
            'nsm_sekolah_asal'=>$request->nsm_sekolah_asal,
            'no_ijazah'=>$request->no_ijazah,
            'no_un'=>$request->no_un,
        ]);
        Alert::success('Berhasil', 'Edit data');
        return redirect()->route('students.index');   
    }
    
    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Models\Student  $student
    * @return \Illuminate\Http\Response
    */
    public function destroy(Student $student)
    {
        Student::find($student->id)->delete();
        Alert::success('Berhasil', 'Hapus data');
        return redirect()->route('students.index');   
    }
    public function import_excel()
    {
        $terbaru = Student::orderby('id','DESC')->first();
        return view('documents.import_students',compact('terbaru'));
    }
    public function import_data(Request $request)
    {
        // menangkap file excel
        $file = $request->file('file');
        
        // membuat nama file unik
        $nama_file = rand().$file->getClientOriginalName();
        
        // upload ke folder file_siswa di dalam folder public
        $file->move('file_santri', $nama_file);
        
        // import data
        Excel::import(new StudentImport($request->start,$request->limit), public_path('/file_santri/'.$nama_file));
        // alihkan halaman kembali
        return back()->with('success','Berhasil Import data!');
    }
    
}