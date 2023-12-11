<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BarangController;
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

Route::get('/welcome', function () {
    echo 'Hello World';
});

Route::get('/show/{id}', function ($id) {
    echo 'Nilai parameter adalah ' . $id;
});

Route::get('/edit/{nama}', function ($nama) {
    echo 'Nilai parameter adalah ' . $nama;
})->where('nama', '[0-9]+');

Route::get('/', function () {
    echo "<a href='" . route('create') . "'>Akses Route dengan nama </a>";
});

Route::get('/create', function () {
    echo 'Route diakses menggunakan nama';
})->name('create');

Route::get('/product', [BarangController::class, 'index']);
Route::get('/product/detail/{id}', [ProdukController::class, 'detail']);
Route::post('/product', [BarangController::class, 'insert']);
Route::patch('/product/{id}', [BarangController::class, 'update']);
Route::delete('/product/{id}', [BarangController::class, 'delete']);
