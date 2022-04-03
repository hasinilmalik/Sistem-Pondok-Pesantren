<?php

use App\Models\User;
use App\Imports\UserImport;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CobaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
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
Route::group(['middleware' => ['role:super admin|admin']], function () {
    Route::controller(StudentController::class)->group( function ()
    {
        Route::get('/students/import','import_excel');
        Route::get('/students/{status?}','index')->name('students.index');
    });  
    Route::resource('students', StudentController::class);
});
Route::post('/students/import_excel', [StudentController::class,'import_data'])->name('students.import');

// NOTE:GUEST
// =======================================================
Route::group(['middleware'=>['role:guest']], function (){
    Route::controller(GuestController::class)->group(function ()
    { 
        Route::get('guest/upload_foto', function (){return view('guest.upload_foto');})->name('guest.upload_foto');
        Route::get('/guest/create',function (){return view('guest.create');});
        Route::get('/guest/show','show')->name('guest.show');
        Route::post('guest/upload_foto',[GuestController::class,'store_foto'])->name('guest.store_foto');
        Route::post('/daftar',[GuestController::class,'store'])->name('guest.store');
    });
});


// NOTE:PAYMENT
Route::group(['middleware'=>['role:guest|admin|super admin']], function ()
{
   Route::controller(TransactionController::class)->group(function ()
   {
       Route::get('/transaction/detail/{reference}','show')->name('pay.detail');
       Route::get('/checkout/{for}','checkout')->name('pay.checkout');
       Route::post('/checkout','store')->name('pay.request');   
   });
});
Route::post('callback',[TripayCallbackController::class,'handle']);

// NOTE:TRY
// =======================================================
// Route::get('coba1', [UserController::class, 'coba1'])->name('coba1');
Route::get('ajax-crud-datatable', [DataTableAjaxCRUDController::class, 'index']);
Route::post('store-company', [DataTableAjaxCRUDController::class, 'store']);
Route::post('edit-company', [DataTableAjaxCRUDController::class, 'edit']);
Route::post('delete-company', [DataTableAjaxCRUDController::class, 'destroy']);

Route::get('/ok', function ()
{
    return str('nama saya')->title();
});
Route::get('convert', function ()
{
    return view('convert');
});

Route::get('cuaca/{kota}',[StudentController::class,'getWeather']);