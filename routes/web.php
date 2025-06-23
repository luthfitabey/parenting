<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DataController;
use App\Http\Controllers\KelurahanController;
use App\Http\Controllers\KecamatanController;
use App\Http\Controllers\BalitaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PrevStuntingController;
use App\Http\Controllers\StuntingController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('dashboard.index');
});

Auth::routes();

// Route untuk Registrasi
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Route untuk Home berdasarkan Role
Route::get('/home', function () {
    if (auth()->check()) {
        return match (auth()->user()->role) {
            'admin' => redirect()->route('admin'),
            'manager' => redirect()->route('manager'),
            default => redirect()->route('user'),
        };
    }
    return redirect('/login'); // Redirect ke login jika belum login
})->name('home');

// Route untuk User (Authenticated Users Only)
Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::get('/user/home', [DashboardController::class, 'dashboard'])->name('user');
});

// Route untuk Admin
Route::middleware(['auth', 'user-access:admin'])->prefix('admin')->group(function () {
    Route::get('/home', [DashboardController::class, 'dashboard'])->name('admin');

    Route::resources([
        'users' => UserController::class,
        'kecamatans' => KecamatanController::class,
        'kelurahans' => KelurahanController::class,
        'balitas' => BalitaController::class,
        'stuntings' => StuntingController::class,
        'prevalensis' => PrevStuntingController::class,
    ]);

    Route::get('/kelurahans/data', [DataController::class, 'kelurahans'])->name('data-kelurahan');
    Route::get('/kecamatans/data', [DataController::class, 'kecamatans'])->name('data-kecamatan');
});

// Route untuk Manager
Route::middleware(['auth', 'user-access:manager'])->prefix('manager')->group(function () {
    Route::get('/home', [DashboardController::class, 'dashboard'])->name('manager');
});

// Route untuk Peta Stunting
Route::get('/peta-stunting', [DashboardController::class, 'petaStunting'])->name('peta.stunting');
