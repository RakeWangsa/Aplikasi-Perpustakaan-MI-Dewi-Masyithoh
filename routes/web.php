<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ManagementController;
use App\Http\Controllers\DaftarKelasController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\AgendaKelasController;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\QrCodeController;

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

Route::redirect('/', '/check');
Route::get('/check', [LoginController::class, 'check'])->name('check');
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);





Route::group(['middleware' => ['auth', 'cekRole:siswa']], function() {
    route::get('/home', [HomeController::class, 'homeSiswa'])->name('homeSiswa')->middleware('auth');
    route::get('/daftarKelasSiswa', [HomeController::class, 'daftarKelasSiswa'])->name('daftarKelasSiswa')->middleware('auth');
    route::get('/tambahKelasSiswa', [HomeController::class, 'tambahKelasSiswa'])->name('tambahKelasSiswa')->middleware('auth');
    route::get('/hapusKelasSiswa/{id}', [HomeController::class, 'hapusKelasSiswa'])->name('hapusKelasSiswa')->middleware('auth');
    route::get('/riwayatAbsen', [AbsensiController::class, 'riwayatAbsen'])->name('riwayatAbsen')->middleware('auth');
    Route::get('/scan/{id_kelas}', [App\Http\Controllers\QrcodeController::class, 'index'])->name('scan')->middleware('auth');
    route::get('/scan/{id_kelas}/submit', [AbsensiController::class, 'submitAbsen'])->name('submitAbsen')->middleware('auth');
    Route::post('/post', [App\Http\Controllers\QrcodeController::class, 'post'])->name('post')->middleware('auth');
});

Route::group(['middleware' => ['auth', 'cekRole:guru']], function() {
    route::get('/home/guru', [HomeController::class, 'homeGuru'])->name('homeGuru')->middleware('auth');
    route::get('/home/absensi/{id}', [HomeController::class, 'absensi'])->name('absensi')->middleware('auth');
    route::get('/generateQR/{id}', [AbsensiController::class, 'generateQR'])->name('generateQR')->middleware('auth');
    route::get('/daftarKelas', [DaftarKelasController::class, 'index'])->name('daftarKelas')->middleware('auth');
    route::get('/daftarSiswa/{id}', [DaftarKelasController::class, 'daftarSiswa'])->name('daftarSiswa')->middleware('auth');
    route::get('/daftarSiswa/{id}/{filter}', [DaftarKelasController::class, 'daftarSiswaFilter'])->name('daftarSiswaFilter')->middleware('auth');
    route::get('/daftarSiswaSearch/{id}', [DaftarKelasController::class, 'daftarSiswaSearch'])->name('daftarSiswaSearch')->middleware('auth');
    route::get('/tambahKelas', [DaftarKelasController::class, 'tambahKelas'])->name('tambahKelas')->middleware('auth');
    route::get('/tambahKelas/submit', [DaftarKelasController::class, 'tambahKelasSubmit'])->name('tambahKelasSubmit')->middleware('auth');
    Route::get('/editKelas/{id}', [DaftarKelasController::class, 'editKelas'])->name('editKelas')->middleware('auth');
    Route::get('/updateKelas/{id}', [DaftarKelasController::class, 'updateKelas'])->name('updateKelas')->middleware('auth');
    Route::get('/hapusKelas/{id}', [DaftarKelasController::class, 'hapusKelas'])->name('hapusKelas')->middleware('auth');
    Route::get('/setHadir/{id_kelas}/{id_siswa}', [AbsensiController::class, 'setHadir'])->name('setHadir')->middleware('auth');
    Route::get('/setSakit/{id_kelas}/{id_siswa}', [AbsensiController::class, 'setSakit'])->name('setSakit')->middleware('auth');
    Route::get('/setIzin/{id_kelas}/{id_siswa}', [AbsensiController::class, 'setIzin'])->name('setIzin')->middleware('auth');
    Route::get('/setTidakHadir/{id_kelas}/{id_siswa}', [AbsensiController::class, 'setTidakHadir'])->name('setTidakHadir')->middleware('auth');
    Route::get('/editHadir/{id_kelas}/{id_siswa}/{waktu}', [AbsensiController::class, 'editHadir'])->name('editHadir')->middleware('auth');
    Route::get('/editSakit/{id_kelas}/{id_siswa}/{waktu}', [AbsensiController::class, 'editSakit'])->name('editSakit')->middleware('auth');
    Route::get('/editIzin/{id_kelas}/{id_siswa}/{waktu}', [AbsensiController::class, 'editIzin'])->name('editIzin')->middleware('auth');
    Route::get('/editAlfa/{id_kelas}/{id_siswa}/{waktu}', [AbsensiController::class, 'editAlfa'])->name('editAlfa')->middleware('auth');
    route::get('/agendaKelas/buat', [AgendaKelasController::class, 'buatAgendaKelas'])->name('buatAgendaKelas')->middleware('auth');
    route::get('/agendaKelas/submit', [AgendaKelasController::class, 'submitAgendaKelas'])->name('submitAgendaKelas')->middleware('auth');
});

Route::group(['middleware' => ['auth', 'cekRole:admin']], function() {
    Route::get('/daftarSiswa', [DaftarController::class, 'daftarSiswa'])->name('daftarSiswa')->middleware('auth');
    Route::get('/daftarBuku', [DaftarController::class, 'daftarBuku'])->name('daftarBuku')->middleware('auth');
    Route::post('/tambahSiswa', [DaftarController::class, 'tambahSiswa'])->name('tambahSiswa')->middleware('auth');
    Route::post('/tambahBuku', [DaftarController::class, 'tambahBuku'])->name('tambahBuku')->middleware('auth');
    Route::get('/hapusSiswa/{id}', [DaftarController::class, 'hapusSiswa'])->name('hapusSiswa')->middleware('auth');

    Route::get('/managementUser/guru', [ManagementController::class, 'managementUserGuru'])->name('managementUserGuru')->middleware('auth');
    Route::get('/managementUser/siswa', [ManagementController::class, 'managementUserSiswa'])->name('managementUserSiswa')->middleware('auth');
    Route::get('/managementUser/guru/search', [ManagementController::class, 'managementUserGuruSearch'])->name('managementUserGuruSearch')->middleware('auth');
    Route::get('/managementUser/siswa/search', [ManagementController::class, 'managementUserSiswaSearch'])->name('managementUserSiswaSearch')->middleware('auth');
    Route::get('/registerGuru', [ManagementController::class, 'tambah'])->name('registerGuru')->middleware('auth');
    Route::post('/registerGuru', [ManagementController::class, 'store'])->middleware('auth')->middleware('auth');
    Route::get('/editUser/{id}', [ManagementController::class, 'editUser'])->name('editUser')->middleware('auth');
    Route::get('/updateUser/{id}', [ManagementController::class, 'updateUser'])->name('updateUser')->middleware('auth');
    Route::get('/hapusUser/{id}', [ManagementController::class, 'hapusUser'])->name('hapusUser')->middleware('auth');
    route::get('/agendaKelas', [AgendaKelasController::class, 'agendaKelas'])->name('agendaKelas')->middleware('auth');
    route::get('/agendaKelas/search', [AgendaKelasController::class, 'agendaKelasSearch'])->name('agendaKelasSearch')->middleware('auth');
    route::get('/agendaKelas/cetak', [AgendaKelasController::class, 'agendaKelasCetak'])->name('agendaKelasCetak')->middleware('auth');
    route::get('/absensiGuru', [AgendaKelasController::class, 'absensiGuru'])->name('absensiGuru')->middleware('auth');
    route::get('/absensiGuru/cetak', [AgendaKelasController::class, 'absensiGuruCetak'])->name('absensiGuruCetak')->middleware('auth');
});

