<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\MasyarakatController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});


// Route CRUD
Route::group(['middleware' => ['auth']], function() {
Route::get('/list-pengaduan', [PengaduanController::class, 'index']);
Route::get('/list-masyarakat', [MasyarakatController::class, 'index']);
Route::get('/lihat-pengaduan/{id}', [PengaduanController::class, 'lihatPengaduan']);
Route::get('/tambah-pengaduan', [PengaduanController::class, 'create']);
Route::get('/tambah-tanggapan', [TanggapanController::class, 'create']);
Route::post('/store-pengaduan', [PengaduanController::class, 'store']);
Route::get('/edit-pengaduan/{id}', [PengaduanController::class, 'edit']);
Route::get('/edit-masyarakat/{id}', [MasyarakatController::class, 'edit']);
Route::put('/update-pengaduan/{id}', [PengaduanController::class, 'update']);
Route::delete('/destroy-pengaduan/{id}', [PengaduanController::class, 'destroy']);

});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
