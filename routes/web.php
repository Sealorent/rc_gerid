<?php

use App\Http\Controllers\Backend\BankDataController;
use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\DataSpasialController;
use App\Http\Controllers\Backend\GenotipeController;
use App\Http\Controllers\Backend\KasusController;
use App\Http\Controllers\Backend\KelompokUmur;
use App\Http\Controllers\Backend\KelompokUmurController;
use App\Http\Controllers\Backend\PengarangController;
use App\Http\Controllers\Backend\TransmisiController;
use App\Http\Controllers\Backend\VirusController;
use App\Http\Controllers\DataWilayahVirusController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', [HomeController::class, 'index'])->name('home.index');
// Route::get('/sign-in-bank-data', [HomeController::class, 'signIn'])->name('signIn.BankData');

Route::get('/sign-in', [HomeController::class, 'signIn'])->name('signIn');
Route::post('/postSignIn', [HomeController::class, 'postSignIn'])->name('postSignIn');

Route::get('/register-user', [HomeController::class, 'register'])->name('registerUser');
Route::post('/postRegister', [HomeController::class, 'postRegister'])->name('postRegisterUser');

// search data
Route::get('/show', [HomeController::class, 'data'])->name('home.showData');
// detail from show data
Route::get('/detail/{id}', [HomeController::class, 'detail'])->name('home.detail');
Route::get('/detail-fasta/{id}', [HomeController::class, 'detailFasta'])->name('fasta.detail');


Route::get('/getData', [DataWilayahVirusController::class, 'getData'])->name('getData');
Route::get('/kabupaten', [DataWilayahVirusController::class, 'getKabupaten'])->name('getKabupaten');

// filter maps
Route::get('/stateAwalMaps', [HomeController::class, 'stateAwalMaps']);
Route::get('/filter', [HomeController::class, 'filter']);


// Google
Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);
// chart visitor
Route::get('/api-visitor', [DashboardController::class, 'getApiVisitor']);
Route::get('/api-jumlah-virus', [DashboardController::class, 'getVirus']);



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('admin-panel', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('bank-data', BankDataController::class);
    Route::resource('data-spasial', DataSpasialController::class);
    Route::resource('kasus', KasusController::class);

    Route::resource('pengarang', PengarangController::class);
    Route::prefix('menu')->group(function () {
        Route::resource('virus', VirusController::class);
        Route::resource('genotipe', GenotipeController::class);
        Route::resource('kelompok-umur', KelompokUmurController::class);
        Route::resource('transmisi', TransmisiController::class);
    });
});

require __DIR__ . '/auth.php';
