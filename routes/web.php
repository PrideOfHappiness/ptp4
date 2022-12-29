<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginPageController;
use App\Http\Controllers\AuthDosenController;
use App\Http\Controllers\AuthMahasiswaController;
use App\Http\Controllers\AuthAdminController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MatakuliahController;
use App\Http\Controllers\MatakuliahDosenController;
use App\Http\Controllers\Pengambilan_MatakuliahController;
use App\Http\Controllers\TugasController;
use App\Http\Controllers\Kumpul_TugasController;
use App\Http\Controllers\LaporanController;

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

Route::get('/', function () {
    return view('navbar/navbar');
});

//Routing Login
Route::get('/mahasiswa', [LoginPageController::class, 'MahasiswaLogin']);
Route::get('/dosen', [LoginPageController::class, 'DosenLogin']);
Route::get('/admin', [LoginPageController::class, 'AdminLogin']);

//Auth
Route::get('/mahasiswa/Home', function () {
    return view('dashboard\dashboardMahasiswa');
})->middleware('auth');

Route::get('/dosen/Home', function () {
    return view('dashboard\dashboardDosen');
})->middleware('auth');

Route::get('/admin/Home', function () {
    return view('dashboard\dashboardAdmin');
})->middleware('auth');

Route::any('/mahasiswa/login', [AuthMahasiswaController::class, 'login'])->name('loginMhs');
Route::post('/logoutMhs', [AuthMahasiswaController::class, 'logout'])->name('logoutMhs');

Route::any('/dosen/login', [AuthDosenController::class, 'login'])->name('loginDsn');
Route::post('/logoutDsn', [AuthDosenController::class, 'logout'])->name('logoutDsn');

Route::any('/admin/login', [AuthAdminController::class, 'login'])->name('loginAdm');
Route::post('/logoutAdm', [AuthAdminController::class, 'logout'])->name('logoutAdm');

//Semester
Route::resource('semester', SemesterController::class);

//User
Route::resource('user', UserController::class);

//Matakuliah
Route::resource('matakuliah', MatakuliahController::class);
Route::resource('matakuliahDosen', MatakuliahDosenController::class);

//Pengambilan_Matakuliah
Route::resource('pengambilan_matakuliah', Pengambilan_MatakuliahController::class);

//Tugas
Route::resource('tuga', TUgasController::class);
/*Route::get('/tuga', [TugasController::class, 'index'])->name('index');
Route::get('/tuga/create', [TugasController::class, 'create']);
Route::post('/tuga/store', [TugasController::class, 'store']);
Route::get('/tuga/{id}', [TugasController::class, 'show']);
Route::get('/tuga/{id}/edit', [TugasController::class, 'edit']);
Route::post('/tuga/{id}', [TugasController::class, 'update']);
Route::delete('/tuga/{id}', [TugasController::class, 'destroy']);*/
Route::get('tuga/tugas/download/{lokasiFile}', [TugasController::class, 'download']);

//Kumpul_Jawaban
Route::get('/listTugas', [Kumpul_TugasController::class, 'index']);
Route::get('/listTugas/{id}', [Kumpul_TugasController::class, 'showTugas']);
Route::get('/listTugas/tugas/download/{lokasiFile}', [Kumpul_TugasController::class, 'downloadTugas']);
Route::post('/kumpulTugas/upload/', [Kumpul_TugasController::class, 'kumpulJawaban']);
Route::get('/tuga/tugas/{id}', [Kumpul_TugasController::class, 'showJawabanAll']);
Route::get('/tuga/tugas/{id}/jawaban', [Kumpul_TugasController::class, 'showJawabanDetail']);
Route::get('/jawaban/download/{namaFile}', [Kumpul_TugasController::class, 'download']);
Route::any('/jawaban/{id}/nilai', [Kumpul_TugasController::class, 'storeNilai']);

//Laporan
Route::get('/laporan', [LaporanController::class, 'index']);
Route::get('/laporan/{id}', [LaporanController::class, 'laporan']);
