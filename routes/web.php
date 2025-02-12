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

// Route untuk menampilkan halaman edit
Route::get('/susut/{id}/edit', [SusutController::class, 'edit'])->name('susut.edit');

// Route untuk menyimpan perubahan
Route::put('/susut/{id}', [SusutController::class, 'update'])->name('susut.update');

Route::get('/login', [SusutController::class, 'login'])->name('susut.login');

Route::get('/susut/grafik', [SusutController::class, 'grafik'])->name('susut.grafik');


Route::get('/susut/{id}/edit', [SusutController::class, 'edit'])->name('susut.edit');
Route::put('/susut/{id}', [SusutController::class, 'update'])->name('susut.update');
Route::delete('/susut/{id}', [SusutController::class, 'destroy'])->name('susut.destroy');


