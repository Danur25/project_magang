<?php



use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SusutController;



Route::resource('susut', SusutController::class);

// Halaman index untuk menampilkan grafik
Route::get('/', [SusutController::class, 'index'])->name('susut.index');

// Halaman form untuk menambah data susut
Route::get('/susut/create', [SusutController::class, 'create'])->name('susut.create');

// Proses penyimpanan data ke database
Route::post('/susut/store', [SusutController::class, 'store'])->name('susut.store');

// Halaman edit data
Route::get('/susut/{id}/edit', [SusutController::class, 'edit'])->name('susut.edit');

// Proses update data
Route::put('/susut/{id}', [SusutController::class, 'update'])->name('susut.update');

Route::get('/login', [SusutController::class, 'login'])->name('susut.login');


