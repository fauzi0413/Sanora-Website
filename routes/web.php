<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\authorController;
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

Route::get('/detailartikel/{id}', [SesiController::class, 'detail_artikel']);
Route::get('/iklan', [SesiController::class, 'iklan']);

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
    Route::get('/admin', [SesiController::class, 'index'])->middleware('userAkses:admin');
    Route::get('/author', [SesiController::class, 'index'])->middleware('userAkses:author');

    // Route::get('/detailartikel/{id}', [SesiController::class, 'detail_artikel']);

    Route::post('/submitartikel/{id}', [authorController::class, 'submitartikel']);
    Route::get('/infoakun', [authorController::class, 'infoakun'])->middleware('userAkses:author');
    Route::get('/karyatulis', [authorController::class, 'karyatulis'])->middleware('userAkses:author');

    Route::get('/pengaturan', [authorController::class, 'pengaturan'])->middleware('userAkses:author');
    Route::put('/editpengaturan', [authorController::class, 'editpengaturan'])->middleware('userAkses:author');

    Route::get('/pengaturan-katasandi', [authorController::class, 'pengaturanpassword'])->middleware('userAkses:author');
    Route::put('/editpassword', [authorController::class, 'editpassword'])->middleware('userAkses:author');

    Route::put('/editprofile', [authorController::class, 'editprofile'])->middleware('userAkses:author');

    Route::get('/panduan-menulis', [authorController::class, 'panduan_menulis'])->middleware('userAkses:author');

    Route::get('/menulis', [authorController::class, 'menulis'])->middleware('userAkses:author');
    Route::post('/kirimtulisan', [authorController::class, 'kirimtulisan'])->middleware('userAkses:author');
    Route::get('/ubahtulisan/{id}', [authorController::class, 'ubah_tulisan'])->middleware('userAkses:author');
    Route::post('/edittulisan/{id}', [authorController::class, 'edittulisan'])->middleware('userAkses:author');
    Route::get('/hapustulisan/{id}', [authorController::class, 'hapustulisan'])->middleware('userAkses:author');

    Route::get('/draft', [authorController::class, 'draft'])->middleware('userAkses:author');
    Route::get('/status', [authorController::class, 'status'])->middleware('userAkses:author');
    Route::get('/pointku', [authorController::class, 'pointku'])->middleware('userAkses:author');

    Route::get('/logout', [SesiController::class, 'logout']);
});
