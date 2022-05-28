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
use App\Http\Controllers\CobaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Livewire\StudentsComponent;
use App\Http\Controllers\CetakController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\ConvertController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\DataTableAjaxCRUDController;
use App\Http\Controllers\Payment\TransactionController;
use App\Http\Controllers\Payment\TripayCallbackController;

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

// NOTE:STUDENTS
// =======================================================
Route::post('/students/import_excel', [StudentController::class,'import_data'])->name('students.import');
Route::group(['middleware' => ['role:super admin|admin']], function () {
    Route::controller(StudentController::class)->group( function ()
    {
        Route::get('/student/json','json');
        Route::get('/student/import','import_excel');
        Route::get('/student/{status?}','index')->name('students.status');
        Route::get('/students/{student}/delete','delete');
    });  
    Route::resource('students', StudentController::class);
    // Route::get('students', StudentsComponent::class)->name('students');
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


// NOTE:PAYMENT
Route::group(['middleware'=>['role:guest|admin|super admin']], function ()
{
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

Route::get('/coba', function ()
{
//    return (new WaService())->infoAkun('6285233002598',session()->get('secretData'));
    // $sender = ["6285233002598", "6285333920007"];
    // echo $sender[array_rand($sender)];
    return Malik::convertHp('085233002598');
});

route::get('cekwa', function ()
{
    $data = [
        'api_key' => 'b2d95af932eedb4de92b3496f338aa5f97b36ae0',
        'sender'  => '6285333920007',
        'number'  => '6285333920007',
        'message' => "cek notifikasi wa",
    ];
    
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://wa.mubakid.xyz/app/api/send-message",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => json_encode($data))
    );
    
    $response = curl_exec($curl);
    
    curl_close($curl);
    $r = json_decode($response);
    return $response;
});

Route::get('convert', function ()
{
    return view('convert');
});
Route::get('nota', function ()
{
    return view('pdf.nota');
});