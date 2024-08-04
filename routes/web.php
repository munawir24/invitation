<?php

use App\Http\Controllers\PesanController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TamuController;
use App\Http\Controllers\TipeUndanganController;
use App\Http\Controllers\WeddingController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('auth.login');
});
// Route::get('/wedding', function () {
//     return view('wedding.index');
// });
Route::get('/wedding', [WeddingController::class, 'index'])->name('wedding');
Route::get('/wedding/alia-abdillah/{id}', [WeddingController::class, 'wedding_alia_abdillah'])->name('wedding-pesanan');
Route::post('/send-message/{id}', [PesanController::class, 'store'])->name('kirim-pesan');

Route::get('/dashboard', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/users', [UserController::class, 'index'])->name('user');
    Route::post('/users/create', [UserController::class, 'store'])->name('simpan-user');
    Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('edit-user');
    Route::post('/users/update/{id}', [UserController::class, 'update'])->name('perbarui-user');
    Route::get('/users/delete/{id}', [UserController::class, 'destroy'])->name('hapus-user');

    // jenis undangan
    Route::get('/tipe-undangan', [TipeUndanganController::class, 'index'])->name('tipe-undangan');
    Route::post('/tipe-undangan/create', [TipeUndanganController::class, 'store'])->name('simpan-tipe-undangan');
    Route::get('/tipe-undangan/edit/{id}', [TipeUndanganController::class, 'edit'])->name('edit-tipe-undangan');
    Route::post('/tipe-undangan/update/{id}', [TipeUndanganController::class, 'update'])->name('perbarui-tipe-undangan');
    Route::get('/tipe-undangan/delete/{id}', [TipeUndanganController::class, 'destroy'])->name('hapus-tipe-undangan');

    // order undangan
    Route::get('/pesanan', [PesananController::class, 'index'])->name('pesanan');

    // Tamu Undangan
    Route::get('/tamu', [TamuController::class, 'index'])->name('tamu');
    Route::post('/tamu/create', [TamuController::class, 'store'])->name('simpan-tamu');
    Route::get('/tamu/edit/{id}', [TamuController::class, 'edit'])->name('edit-tamu');
    Route::post('/tamu/update/{id}', [TamuController::class, 'update'])->name('perbarui-tamu');
    Route::get('/tamu/delete/{id}', [TamuController::class, 'destroy'])->name('hapus-tamu');

    // Pesan Undangan
    Route::get('/sending-message', [PesanController::class, 'index'])->name('kiriman-pesan');
    Route::get('/sending-message/delete/{id}', [PesanController::class, 'destroy'])->name('hapus-kiriman-pesan');

});

require __DIR__ . '/auth.php';
