<?php

use App\Http\Controllers\CetakController;
use App\Http\Controllers\ConvertController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use App\Imports\UserImport;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();
Route::controller(HomeController::class)->group(function(){
    Route::get('/', 'index');
    Route::get('/home', 'index')->name('home');
});

// Route::get('/cetak',[CetakController::class,'index'])->name('cetak');
Route::controller(CetakController::class)->name('cetak.')->group(function ()
{
    Route::get('/cetak/mahrom/{id}/{name}','mahrom')->name('mahrom');
});

Route::group(['middleware' => ['role:super admin']], function () {
    Route::get('/students/import', [StudentController::class,'import_excel']);
    Route::resource('students', StudentController::class);
});
Route::post('/students/import_excel', [StudentController::class,'import_data'])->name('students.import');

Route::get('/ok', function ()
{
    return str('nama saya')->title();
});

// Route::get('convert',[ConvertController::class,'covertNis']);
Route::get('convert', function ()
{
    return view('convert');
});
