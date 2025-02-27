<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SupplyerController;
use App\Http\Controllers\WilayahController;
use App\Http\Controllers\ProdukController;

Route::get('/', function () {
    return redirect('dashboard');
});


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('supplier')->group(function () {    
        Route::get('/', [SupplyerController::class, 'getSupplier'])->name('getSupplier');
        Route::get('/input', [SupplyerController::class, 'inputSupplier'])->name('inputSupplier');
        Route::post('/input', [SupplyerController::class, 'saveInputSupplier'])->name('saveInputSupplier');
        Route::get('/edit', [SupplyerController::class, 'editSupplier'])->name('editSupplier');
        Route::post('/edit', [SupplyerController::class, 'saveEditSupplier'])->name('saveEditSupplier');
        Route::post('/hapus', [SupplyerController::class, 'hapusSupplier'])->name('hapusSupplier');
    }); 

    Route::prefix('produk')->group(function () {       
        Route::get('/', [ProdukController::class, 'getProduk'])->name('getProduk');
        Route::get('/input', [ProdukController::class, 'inputProduk'])->name('inputProduk');
        Route::post('/input', [ProdukController::class, 'saveInputProduk'])->name('saveInputProduk');
        Route::get('/edit', [ProdukController::class, 'editProduk'])->name('editProduk');
        Route::post('/edit', [ProdukController::class, 'saveEditProduk'])->name('saveEditProduk');
        Route::post('/hapus', [ProdukController::class, 'hapusProduk'])->name('hapusProduk');
    });
    
});

Route::prefix('wilayah')->group(function () {    
    Route::get('/kabupaten', [WilayahController::class, 'getKabupaten'])->name('getKabupaten');
    Route::get('/kecamatan', [WilayahController::class, 'getKecamatan'])->name('getKecamatan');
    Route::get('/Kelurahan', [WilayahController::class, 'getKelurahan'])->name('getKelurahan');

});

require __DIR__.'/auth.php';
