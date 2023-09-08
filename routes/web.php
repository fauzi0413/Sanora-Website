<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\authorController;
use App\Http\Controllers\SesiController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
Route::get('/artikel/{id}', [SesiController::class, 'detail_artikel_tayangan']);
Route::get('/iklan', [SesiController::class, 'iklan']);
Route::get('/search', [SesiController::class, 'search']);

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

Auth::routes([
    'verify' => true
]);

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

// Route middleware auth digunakan untuk mengakses halaman apabila user dalam keadaan login
Route::middleware(['auth', 'verified'])->group(function () {
    // Router Admin
    Route::get('/admin', [adminController::class, 'index'])->middleware('userAkses:admin');

    Route::get('/infoakun_admin', [adminController::class, 'infoakun'])->middleware('userAkses:admin');

    Route::get('/dataauthor', [adminController::class, 'views_akun_author'])->middleware('userAkses:admin');
    Route::get('/dataadmin', [adminController::class, 'views_akun_admin'])->middleware('userAkses:admin');
    Route::get('/dataartikel', [adminController::class, 'views_artikel'])->middleware('userAkses:admin');
    Route::get('/detailartikel_admin/{id}', [adminController::class, 'detail_artikel'])->middleware('userAkses:admin');
    Route::get('/hapus_artikel/{id}', [authorController::class, 'hapus_artikel'])->middleware('userAkses:admin');

    Route::get('/pengaturan-admin', [adminController::class, 'pengaturan'])->middleware('userAkses:admin');
    Route::put('/editpengaturan_admin', [adminController::class, 'editpengaturan'])->middleware('userAkses:admin');

    Route::get('/pengaturan-katasandi-admin', [adminController::class, 'pengaturanpassword'])->middleware('userAkses:admin');
    Route::put('/editpassword_admin', [adminController::class, 'editpassword'])->middleware('userAkses:admin');

    Route::put('/editprofile_admin', [adminController::class, 'editprofile'])->middleware('userAkses:admin');

    Route::get('/createakun', [adminController::class, 'createakun_views'])->middleware('userAkses:admin');
    Route::post('/createakun', [adminController::class, 'createakun'])->middleware('userAkses:admin');

    Route::get('/editakun/{id}', [adminController::class, 'editakun_views'])->middleware('userAkses:admin');
    Route::put('/editakun/{id}', [adminController::class, 'editakun'])->middleware('userAkses:admin');

    Route::get('/hapusakun/{id}', [adminController::class, 'hapusakun'])->middleware('userAkses:admin');

    Route::post('/submitartikel_admin/{id}', [adminController::class, 'submitartikel'])->middleware('userAkses:admin');
    Route::post('/kirimcatatan/{id}', [adminController::class, 'kirimcatatan'])->middleware('userAkses:admin');

    // 

    // Router Author
    Route::get('/author', [SesiController::class, 'index'])->middleware('userAkses:author');

    Route::post('/submitartikel/{id}', [authorController::class, 'submitartikel'])->middleware('userAkses:author');
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

    Route::get('/karyatulis/search', [authorController::class, 'searchartikel'])->middleware('userAkses:author');
    Route::get('/draft/search', [authorController::class, 'searchdraft'])->middleware('userAkses:author');
    Route::get('/status/search', [authorController::class, 'searchstatus'])->middleware('userAkses:author');

    Route::get('/logout', [SesiController::class, 'logout']);
});
