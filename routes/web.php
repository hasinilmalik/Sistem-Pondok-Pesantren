<?php

use App\Models\User;
use App\Helpers\Malik;
use App\Imports\UserImport;
use App\Services\WaService;
use Illuminate\Http\Request;
use App\Models\MadinInstitution;
use Yajra\DataTables\DataTables;
use App\Models\FormalInstitution;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\CobaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Livewire\StudentsComponent;
use App\Http\Controllers\{
    CetakController,
    GuestController,
    BackupController,
    ExportController,
    RevisiController,
    ConvertController,
    StudentController,
    DataTableAjaxCRUDController,
    MadinController,
    PagesController
};
use App\Http\Controllers\Payment\{TransactionController,
    TripayCallbackController
};
use Illuminate\Support\Facades\Auth;

// NOTE:AUTH
// =======================================================
Auth::routes();
Route::controller(HomeController::class)->group(function(){
    Route::get('/', 'index');
    Route::get('/home', 'index')->name('home');
});
// NOTE:CETAK
// =======================================================
Route::controller(CetakController::class)->name('cetak.')->group(function ()
{
    Route::get('/cetak/mahrom/{id}/{name}','mahrom')->name('mahrom');
});



// NOTE:GUEST
// =======================================================
Route::group(['middleware'=>['role:guest']], function (){
    Route::controller(GuestController::class)->group(function ()
    { 
        Route::get('guest/upload_foto', function (){return view('guest.upload_foto');})->name('guest.upload_foto');
        Route::get('/guest/create',function (){
            $madin = MadinInstitution::get();
            $formal = FormalInstitution::get();
            return view('guest.create',compact('madin','formal'));
        });
        Route::get('/guest/show','show')->name('guest.show');
        Route::post('guest/upload_foto',[GuestController::class,'store_foto'])->name('guest.store_foto');
        Route::post('/daftar',[GuestController::class,'store'])->name('guest.store');
    });
});

Route::group(['middleware'=>['role:admin|super admin']], function (){
    Route::resource('user', UserController::class);
});

Route::controller(PDFController::class)->name('pdf.')->group(function ()
{
    Route::get('/pdf/biodata/{id}','biodata')->name('biodata');
    Route::get('/pdf/mou/{id}','mou')->name('mou');
});


// NOTE:GROUP_MIDDLEWARE_ADMIN
// =======================================================
Route::group(['middleware'=>['role:guest|admin|super admin']], function ()
{
    // NOTE:PAYMENT
    // =======================================================
    Route::controller(TransactionController::class)->group(function ()
    {
        Route::post('/transaction/cash','payCash')->name('pay.cash');
        Route::get('/transaction/detail/{reference}','show')->name('pay.detail');
        Route::get('/transaction/change-method/{reference}','changeMethod')->name('pay.change');
        Route::get('/transaction/list/{method}','daftarTransaksi')->name('pay.list');
        Route::get('/checkout/{for}','checkout')->name('pay.checkout');
        Route::post('/checkout_proses','store')->name('pay.request');   
        Route::post('/checkout_proses2','storeViaAdmin')->name('pay.requestViaAdmin');   
        Route::get('/guest/bills','guestBills')->name('guest.bills');
    });
    
    // NOTE:USERS
    // =======================================================
    Route::get('json/users',[UserController::class,'json']);
    Route::get('/users/{user}/delete',[UserController::class,'delete']);
    Route::resource('users',UserController::class);
    
    // NOTE:STUDENTS
    // =======================================================
    Route::post('/students/import_excel', [StudentController::class,'import_data'])->name('students.import');
    Route::controller(StudentController::class)->group( function ()
    {
        Route::get('/student/{status}/json','json');
        Route::get('/student/import','import_excel');
        Route::get('/student/{status?}','index')->name('students.status');
        Route::get('/students/{student}/delete','delete');
    });  
    Route::resource('students', StudentController::class);
    
    
    // NOTE:BACKUP
    // =======================================================
    Route::get('/backup', [BackupController::class,'index']);
    Route::get('/backup/create',function (){ Artisan::call('backup:run');})->name('backup.create');
    Route::get('/backup/download/{file_name}', [BackupController::class,'download']);
    Route::get('/backup/delete/{file_name}', [BackupController::class,'delete']);
    
});
Route::post('callback',[TripayCallbackController::class,'handle']);
Route::get('/nota/{reference}',[TransactionController::class,'invoice'])->name('pay.invoice');


// NOTE:TRY
// =======================================================
// Route::get('coba1', [UserController::class, 'coba1'])->name('coba1');
Route::get('ajax-crud-datatable', [DataTableAjaxCRUDController::class, 'index']);
Route::post('store-company', [DataTableAjaxCRUDController::class, 'store']);
Route::post('edit-company', [DataTableAjaxCRUDController::class, 'edit']);
Route::post('delete-company', [DataTableAjaxCRUDController::class, 'destroy']);


// NOTE:EXPORT
// =======================================================
Route::group(['middleware'=>['role:guest|admin|super admin']], function ()
{
    Route::controller(ExportController::class)->group(function ()
    {
        Route::get('/export/{type}/students','students')->name('export.students');
    });
});

// NOTE:REVISI
// =======================================================
// Route::get('isimadin',[RevisiController::class,'isiMadin']);
// Route::get('isimadin0',[RevisiController::class,'isiMadinNull']);
// Route::get('revisimadin',[RevisiController::class,'revisiMadin']);
// Route::get('revisiformal',[RevisiController::class,'revisiFormal']);
Route::get('rdaerah',[RevisiController::class,'revisiDaerah']);


// NOTE:TAWURAN
// =======================================================
Route::get('/coba', function ()
{
    //    return (new WaService())->infoAkun('6285233002598',session()->get('secretData'));
    // $sender = ["6285233002598", "6285333920007"];
    // echo $sender[array_rand($sender)];
    return Malik::convertHp('085233002598');
});


Route::get('convert', function ()
{
    return view('convert');
});
Route::get('nota', function ()
{
    return view('pdf.nota');
});

Route::get('/x', function ()
{
    return view('exit_permit.index');
});

Route::get('/madin-data/{status}',[MadinController::class,'data']);
Route::get('/madin-mapel',[MadinController::class,'mapel']);
Route::post('/madin-mapel',[MadinController::class,'mapelPost']);
Route::get('/madin-mapel/{item}/edit',[MadinController::class,'mapelEdit'])->name('madin-mapel.edit');
Route::get('/madin-mapel/create',[MadinController::class,'create'])->name('madin-mapel.create');

Route::post('/madin-kelas',[MadinController::class,'kelasStore']);
Route::get('/madin-kelas',[MadinController::class,'kelas']);
Route::delete('/madin-kelas/{id}',[MadinController::class,'kelasDelete']);