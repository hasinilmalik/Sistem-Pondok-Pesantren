<?php

namespace App\Http\Controllers;

use App\Helpers\Malik;
use Carbon\Carbon;
use App\Models\Family;
use App\Models\Student;
use App\Models\Addition;
use App\Services\WaService;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Imports\StudentImport;
use Yajra\DataTables\DataTables;
use App\Services\LocationService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use Illuminate\Support\Facades\Http;

class StudentController extends Controller
{
    public function json($status)
    {
        $data = Student::with('dormitory:id,name')
        ->where('status', $status)
        ->orderBy('created_at', 'desc');
        return DataTables::of($data)
        ->addColumn('action',function($data){
            $url_show = url('students/'.$data->id);
            $url_edit = url('students/'. $data->id .'/edit');
            $url_delete = url('students/'.$data->id.'/delete');
            $biodata = url('pdf/biodata/'. $data->id);
            $mou = url('pdf/mou/'.$data->id);
            $mahrom_card = url('/cetak/mahrom/'.$data->id.'/'.$data->nama);
            
            $b1 = '<div class="btn-group"><button type="button" class="btn bg-gradient-success dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false"></button><ul class="dropdown-menu">
            <li><a class="dropdown-item" href="'.$url_show.'">Lihat</a></li>
            <li><a class="dropdown-item" href="'.$url_edit.'">Edit</a></li>
            <!-- <li><a style="color:red" class="dropdown-item" href="'.$url_delete.'">Hapus</a></li> -->
            <li><hr class="dropdown-divider"></li>';
            $moukts = '<li><a class="dropdown-item" href="'.$biodata.'" target="_blank"><i class="fas fa-print"></i> Biodata </a></li><li><a class="dropdown-item" href="'.$mou.'" target="_blank"><i class="fas fa-print"></i> MoU </a></li> <li><a class="dropdown-item" href="#"><i class="fas fa-print"></i> KTS </a></li>';
            $mahrom = '<li><a target="_blank" class="dropdown-item" href="'.$mahrom_card.'"><i class="fas fa-print"></i> Mahrom </a></li>';
            $close = '</ul></div>';
            
            
            
            $button = $b1.$moukts.$mahrom.$close;
            
            // $button = $b1.$moukts.$close;
            
            
            return $button;
        })
        ->rawColumns(['action'])
        ->make(true);
    }
    
    public function index($status=null)
    {
        $jml_baru = $this->_getCountNewStudent();
        if ($status==null) {
            $students = $this->getStudents();
        }else{
            $students = $this->getStudents($status);
        }  
        return view('students.index', compact('jml_baru'));
    }
    public function getStudents($status='santri')
    {
        $user = Auth::user();
        if(Auth::user()->roles->first()->name=='super admin'){
            $students = Student::with('family')
            ->where('status',$status)
            ->orderBy('user_id','desc')->get();
        }else{
            $students = Student::with('family')
            ->where('jenis_kelamin', $user->jk)
            ->where('status',$status)
            ->orderBy('user_id','desc')->get();
        }      
        return $students;
    }
    public function create()
    {
        // $LS = new LocationService();
        // $kota = $LS->kota();
        // dd($kota);
        return view('students.create');
    }
    public function imageStore($foto, $foto_wali, $nama_foto = null, $nama_foto_wali = null)
    {
        if ($file = $foto) {
            $path = 'foto_santri/';
            $fileName_santri   = time() . $file->getClientOriginalName();
            Storage::disk('public')->put($path . $fileName_santri, File::get($file));
            $file_name  = $file->getClientOriginalName();
            $file_type  = $file->getClientOriginalExtension();
            $filePath   = 'storage/'.$path . $fileName_santri;
            $data['foto']=$fileName_santri;
        }
        if ($file = $foto_wali) {
            $path = 'foto_wali/';
            $fileName_wali   = time() . $file->getClientOriginalName();
            Storage::disk('public')->put($path . $fileName_wali, File::get($file));
            $file_name  = $file->getClientOriginalName();
            $file_type  = $file->getClientOriginalExtension();
            $filePath   = 'storage/'.$path . $fileName_wali;
            $data['foto_wali']=$fileName_wali;
        }
        
        $user = Auth::user()->id;
        if ($user!=1|$user!=2|$user!=3) {
            if ($nama_foto!=null) {
                Student::where('id', Auth::user()->student->id)->update([
                    'foto'=>$nama_foto,
                ]);
            }
            if ($nama_foto_wali!=null) {
                Student::where('id', Auth::user()->student->id)->update([
                    'foto_wali'=>$nama_foto_wali,
                ]);
            }
        }
    }
    public function store(StoreStudentRequest $request)
    {     
        $validatedData = $request->validate([
            'foto' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'foto_wali' => 'image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);
        
        $this->imageStore($request->file('foto'), $request->file('foto_wali'));
        $data = $request->all();
        
        //ambil tahun sekarang ex:22
        $year = Carbon::now()->format('y');
        // ambil nis terakhir
        $datanis = Student::max('nis')+1;
        // buat nis baru
        
        $datanis = $year.Str::substr($datanis, 2);
        
        if($request['email']){
            $email=$request['email'];
        }else{
            $email = time() . '@bakid.id';
        }     
        // input ke tabel users
        $id = DB::table('users')->insertGetId([
            'email' => $email,
            'name'=>$request['nama'],
            'jk'=>$request['jenis_kelamin'],
            'password'=>bcrypt('12345678')
        ]);
        
        
        if($foto = $request->file('foto')){
            $data['foto']  = time() . $foto->getClientOriginalName();
        }
        if($foto_wali = $request->file('foto_wali')){
            $data['foto_wali'] = time() . $foto_wali->getClientOriginalName();
        }
        
        $response = HTTP::get('https://www.emsifa.com/api-wilayah-indonesia/api/province/'.$request->provinsi.'.json');
        $data['provinsi'] = json_decode($response->body())->name;
        
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
            
            'sekolah_asal'=>$request['sekolah_asal'],
            'alamat_sekolah_asal'=>$request['alamat_sekolah_asal'],
            'npsn_sekolah_asal'=>$request['npsn_sekolah_asal'],
            'nsm_sekolah_asal'=>$request['nsm_sekolah_asal'],
            'no_ijazah'=>$request['no_ijazah'],
            'no_un'=>$request['no_un'],
        ]);
        
        
        return redirect()->route('pay.checkout',1)->with(['email'=>$email, 'success'=>'Berhasil tambah data']);
        // return redirect()->route('students.status','baru');
    }
    public function show(Student $student)
    {
        $forView = 'show';
        return view('students.edit', compact('student','forView'));
    }
    public function edit(Student $student)
    {
        $forView = 'edit';
        return view('students.edit', compact('student','forView'));
    }
    public function update(UpdateStudentRequest $request, Student $student)
    {
        // cara menyimpan bisa juga menggunakan storeAs() atau put()
        $data = $request->all();
        if($request->daerah!=null){
            $mh = new Malik();
            $newdae = $mh->convertDaerah($request->jenis_kelamin,$request->daerah);
            $dormitory_id = $newdae['dormitory_id'];
            $rooms = $newdae['rooms'];
        }
        if ($file = $request->file('foto')) {
            // dd($file);
            $path = 'public/foto_santri/';
            $fileName_santri   = time() . $file->getClientOriginalName();
            Storage::disk('local')->put($path . $fileName_santri, File::get($file));
            $file_name  = $file->getClientOriginalName();
            $file_type  = $file->getClientOriginalExtension();
            $filePath   = 'storage/'.$path . $fileName_santri;
            $santri=$fileName_santri;
        }
        if ($file = $request->file('foto_wali')) {
            // dd($file);
            $path = 'public/foto_wali/';
            $fileName_wali   = time() . $file->getClientOriginalName();
            Storage::disk('local')->put($path . $fileName_wali, File::get($file));
            $file_name  = $file->getClientOriginalName();
            $file_type  = $file->getClientOriginalExtension();
            $filePath   = 'storage/'.$path . $fileName_wali;
            $wali=$fileName_wali;
        }
        // $this->imageStore($request->file('foto'), $request->file('foto_wali'));
        $data['rooms']=$rooms;
        $data['dormitory_id']=$dormitory_id;
        if ($request->file('foto_wali')) {
            $data['foto_wali']=$wali;
        }
        if ($request->file('foto')) {
            $data['foto']=$santri;
        }
        
        $student->update($data);
        
        
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
            // 'lembaga_formal'=>$request->lembaga_formal,
            // 'madin'=>$request->madin,
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
        Excel::import(new StudentImport($request->start, $request->limit), public_path('/file_santri/'.$nama_file));
        // alihkan halaman kembali
        return back()->with('success', 'Berhasil Import data!');
    }
    function _getCountNewStudent()
    {
        $user = Auth::user()->roles->first()->name;
        if($user=='super admin'){
            $jml_data = Student::where('status','baru')->count();
        }else{
            $admin = Auth::user()->jk;
            $jml_data = Student::where('status','baru')->where('jenis_kelamin',$admin)->count();
        }
        return $jml_data;
    }
    public function delete(Student $student)
    {
        Student::find($student->id)->delete();
        Alert::success('Berhasil', 'Hapus data');
        return redirect()->route('students.index');   
    }
}

