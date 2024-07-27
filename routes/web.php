<?php

use App\Http\Controllers\PesanController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TamuController;
use App\Http\Controllers\TipeUndanganController;
use App\Http\Controllers\WeddingController;
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
    return view('welcome');
});
// Route::get('/wedding', function () {
//     return view('wedding.index');
// });
Route::get('/wedding', [WeddingController::class, 'index'])->name('wedding');
Route::get('/wedding/alia-abdillah/{id}', [WeddingController::class, 'wedding_alia_abdillah'])->name('wedding-pesanan');
Route::post('/send-message/{id}', [PesanController::class,'store'])->name('kirim-pesan');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/pesanan', [PesananController::class, 'index'])->name('pesanan');
    Route::get('/tamu', [TamuController::class, 'index'])->name('tamu');
    Route::get('/tipe-undangan', [TipeUndanganController::class, 'index'])->name('tipe-undangan');
});

require __DIR__.'/auth.php';
