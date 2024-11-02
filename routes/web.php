<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AwalController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\VotingController;
use App\Http\Controllers\LaporController;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\PenggunaController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::middleware('only_guest')->group(function() {
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'authentication']);
    Route::post('register', [AuthController::class, 'register'])->name('register');
});

Route::middleware('auth')->group(function(){
    Route::get('logout', [AuthController::class, 'logout']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::get('/', function () {
        return view('awal');
    });
});
Route::get('awal', [AwalController::class, 'awal'])->name('awal');

Route::middleware('only_user')->group(function(){
    Route::get('lapor', [LaporController::class, 'lapor']);
    Route::get('akun', [AkunController::class, 'akun']);
    Route::get('history', [HistoryController::class, 'history']);
    Route::get('about', [AboutController::class, 'about']);
    Route::get('voting', [VotingController::class, 'voting']);
    Route::post('/lapor', [LaporanController::class, 'store'])->name('lapor.store');
});

Route::middleware('only_admin')->group(function(){
    Route::get('dashboard', [DashboardController::class, 'dashboard']);
    Route::get('jenis', [JenisController::class, 'jenis']);
    Route::get('pengguna', [PenggunaController::class, 'pengguna']);
    Route::get('laporan', [LaporanController::class, 'admin']);
    Route::get('profile', [AkunController::class, 'profile']);
    Route::get('historylaporan', [HistoryController::class, 'historylaporan']);
});
