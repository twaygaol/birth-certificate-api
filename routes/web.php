<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BirthCertificateController;
use App\Http\Controllers\SkckController;
use App\Http\Controllers\MeninggalDuniaController;
use App\Http\Controllers\DomisiliController;
use App\Http\Controllers\KehilanganController;
use App\Http\Controllers\KurangMampuController;
use App\Http\Controllers\N1Controller;
use App\Http\Controllers\N2Controller;
use App\Http\Controllers\N3Controller;
use App\Http\Controllers\N4Controller;

Route::get('/', function () {
    return view('home');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', [\App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login.submit');
Route::post('/logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/register', [\App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register.submit');

Route::middleware(['auth'])->group(function () {
    Route::get('/birth-certificates', [BirthCertificateController::class, 'index'])->name('birth-certificates.index');
    Route::resource('birth-certificates', BirthCertificateController::class);
});

// Route untuk menampilkan daftar SKCK
Route::get('/skck', [SkckController::class, 'index'])->name('skck.index');
Route::post('/skck/create', [SkckController::class, 'store'])->name('skck.store');

// Route untuk menampilkan daftar DOMSILI
Route::get('/domisili', [DomisiliController::class, 'index'])->name('domisili.index');
Route::post('/domisili/create', [DomisiliController::class, 'store'])->name('domisili.store');

// Route untuk menampilkan daftar menunggal dunia
Route::get('/meninggaldunia', [MeninggalDuniaController::class, 'index'])->name('meninggaldunia.index');
Route::post('/meninggaldunia/create', [MeninggalDuniaController::class, 'store'])->name('meninggaldunia.store');

// Route untuk menampilkan daftar kehilangan
Route::get('/kehilangan', [KehilanganController::class, 'index'])->name('kehilangan.index');
Route::post('/kehilangan/create', [KehilanganController::class, 'store'])->name('kehilangan.store');

// Route untuk menanampilkan daftar kurang mampu
Route::get('/kurang-mampu/create', [KurangMampuController::class, 'index'])->name('kurang-mampu.index');
Route::post('/kurang-mampu', [KurangMampuController::class, 'store'])->name('kurang-mampu.store');

// n1
Route::get('/n1/create', [N1Controller::class, 'index'])->name('n1.index');
Route::post('/n1', [N1Controller::class, 'store'])->name('n1.store');

// n2
Route::get('/n2/create', [N2Controller::class, 'index'])->name('n2.index');
Route::post('/n2', [N2Controller::class, 'store'])->name('n2.store');

//n3
Route::get('/n3/create', [N3Controller::class, 'index'])->name('n3.index');
Route::post('/n3', [N3Controller::class, 'store'])->name('n3.store');

// n4
Route::get('/n4/create', [N4Controller::class, 'index'])->name('n4.index');
Route::post('/n4', [N4Controller::class, 'store'])->name('n4.store');

// cetak
Route::get('/surat/cetak/{id}/{jenis_surat}', [BirthCertificateController::class, 'cetakSurat'])->name('birth-certificates.cetak');




