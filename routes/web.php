<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\SesiController;
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

Auth::routes();

// Route middleware guest digunakan untuk mengakses halaman apabila user tidak dalam keadaan login
Route::middleware(['guest'])->group(function () {
    Route::get('/', [SesiController::class, 'index']);
    Route::get('/login', [SesiController::class, 'loginview'])->name('login');
    Route::post('/login', [SesiController::class, 'login']);
    Route::get('/register', [SesiController::class, 'registerview']);
    Route::post('/register', [SesiController::class, 'register']);
});

Route::get('/home', function () {
    return redirect('/admin');
});

// Route middleware auth digunakan untuk mengakses halaman apabila user dalam keadaan login
Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [adminController::class, 'index'])->middleware('userAkses:admin');
    Route::get('/author', [adminController::class, 'author'])->middleware('userAkses:author');
    Route::get('/logout', [SesiController::class, 'logout']);
});
