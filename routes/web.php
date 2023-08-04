<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SimpananAnggotaController;
use App\Http\Controllers\PinjamanController;
use App\Http\Controllers\JasaAnggotaController;
use App\Http\Controllers\SHUAnggotaController;
use App\Http\Controllers\JenisSimpananController;
use App\Http\Controllers\SimpananController;
use App\Http\Controllers\AnggotaUserController;
use App\Http\Controllers\SimpananUserController;
use App\Http\Controllers\PinjamanUserController;
use App\Http\Controllers\JasaUserController;
use App\Http\Controllers\AngsuranController;
use App\Http\Controllers\SHUUserController;
use App\Http\Controllers\PenarikanController;
use App\Http\Controllers\JenisPinjamanController;
use App\Http\Controllers\DetailSimpananController;


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
Route::resource('/dashboard', DashboardController::class);
Route::resource('/home', HomeController::class);
Route::get('/kokoko', function () {
    return view('/welcome');
});

// Route::middleware(['guest'])->group(function(){
//     Route::resource('/', HomeController::class);
// });

// Route::get('/anggota', [AnggotaController::class,'index']);

Route::middleware(['auth', 'admin'])->group(function(){
    Route::resource('/anggota', AnggotaController::class);
    // Route::resource('/dataAnggota', AnggotaUserController::class);
    // Route::resource('/dataSimpanan', SimpananUserController::class);
    // Route::resource('/dataPinjaman', PinjamanUserController::class);
    // Route::resource('/dataJasa', JasaUserController::class);
    Route::get('/anggota/show', [AnggotaController::class, 'show']);
    
    // Route::post('/logout', [LoginController::class, 'logout']);
    // 
    Route::resource('/admin', AdminController::class);
    Route::resource('/simpanananggota', SimpananAnggotaController::class);
    Route::resource('/detailSimpanan', DetailSimpananController::class);
    Route::resource('/pinjamananggota', PinjamananggotaController::class);
    Route::resource('/simpanan', SimpananController::class);
    Route::resource('/angsuran', AngsuranController::class);
    Route::resource('/pinjaman', PinjamanController::class);
    Route::resource('/jenisSimpanan', JenisSimpananController::class);
    Route::resource('/jenisPinjaman', JenisPinjamanController::class);
    Route::resource('/jasaAnggota', JasaAnggotaController::class);
    Route::resource('/shuAnggota', SHUAnggotaController::class);
    Route::resource('/dashboard', UserController::class);
    Route::resource('/penarikan', PenarikanController::class);
    Route::get('/admin/dashboard', [AdminController::class, 'show']);
    

});

Route::middleware(['auth'])->group(function(){
    Route::resource('/anggota', AnggotaController::class);
    Route::resource('/dataAnggota', AnggotaUserController::class);
    Route::resource('/dataSimpanan', SimpananUserController::class);
    Route::resource('/dataPinjaman', PinjamanUserController::class);
    Route::resource('/dataJasa', JasaUserController::class);
    Route::resource('/dataSHU', SHUUserController::class);
    Route::resource('/user', UserController::class);

});



Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
