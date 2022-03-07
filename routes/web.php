<?php

use App\Http\Controllers\CetakController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

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
Route::resource('students', StudentController::class);

Route::get('/ok', function ()
{
    return str('nama saya')->title();
});