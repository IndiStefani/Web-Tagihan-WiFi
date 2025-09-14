<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TagihanController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index'])->middleware(['auth'])->name('dashboard');

Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
});

// Route::group(['middleware' => ['auth']], function () {
//     Route::get('/users', [UserController::class, 'index'])->name('user.index');
//     Route::get('/users/create', [UserController::class, 'create'])->name('user.create');
//     Route::post('/users', [UserController::class, 'store'])->name('user.store');
//     Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
//     Route::put('/users/{id}', [UserController::class, 'update'])->name('user.update');
//     Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('user.destroy');
// });

Route::group(['prefix' => 'profile', 'middleware' => ['auth']], function () {
    Route::get('/show', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/password', [ProfileController::class, 'updatePassword'])->name('profile.password.update');
    Route::patch('/update', [ProfileController::class, 'update'])->name('profile.update');
});

Route::group(['middleware' => ['auth']], function () {
    Route::resource('paket', PaketController::class);
});

Route::group(['prefix' => 'pelanggan', 'middleware' => ['auth']], function () {
    Route::get('/', [PelangganController::class, 'index'])->name('pelanggan.index');
    Route::get('/create', [PelangganController::class, 'create'])->name('pelanggan.create');
    Route::post('/store', [PelangganController::class, 'store'])->name('pelanggan.store');
    Route::get('/edit/{id}', [PelangganController::class, 'edit'])->name('pelanggan.edit');
    Route::put('/update/{id}', [PelangganController::class, 'update'])->name('pelanggan.update');
    Route::delete('/destroy/{id}', [PelangganController::class, 'destroy'])->name('pelanggan.destroy');
    Route::get('/show/{id}', [PelangganController::class, 'show'])->name('pelanggan.show');
    Route::get('/export', [PelangganController::class, 'export'])->name('pelanggan.export');
    Route::post('/import', [PelangganController::class, 'importPelanggan'])->name('pelanggan.import');
});

Route::group(['prefix' => 'tagihan', 'middleware' => ['auth']], function () {
    Route::get('/', [TagihanController::class, 'index'])->name('tagihan.index');
    Route::get('/create', [TagihanController::class, 'create'])->name('tagihan.create');
    Route::post('/store', [TagihanController::class, 'store'])->name('tagihan.store');
    Route::get('/edit/{id}', [TagihanController::class, 'edit'])->name('tagihan.edit');
    Route::put('/update/{id}', [TagihanController::class, 'update'])->name('tagihan.update');
    Route::put('/tagihan/{id}/update-status', [TagihanController::class, 'updateStatus'])->name('tagihan.updateStatus');
    Route::delete('/destroy/{id}', [TagihanController::class, 'destroy'])->name('tagihan.destroy');
    Route::get('/show/{id}', [TagihanController::class, 'show'])->name('tagihan.show');
});
