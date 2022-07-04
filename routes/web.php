<?php
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PenggunaController;
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



// Route::get('/dashboard', function () {
//     return view('admin/dashboard');
// });



Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function ()  {

    Route::get('/dashboard', [DashboardController::class, 'index']);

    Route::resource('/kategori', KategoriController::class);
    Route::resource('/post', PostController::class);
    Route::resource('/tag', TagController::class);
    Route::resource('/banner', BannerController::class);
    Route::resource('/pengguna', PenggunaController::class);

    Route::get('/user/{id}/setting', [UserController::class, 'setting']);
    Route::patch('/user/{id}/setting', [UserController::class, 'ubah_password']);
});


Route::get('/', [ArtikelController::class, 'index']);
Route::get('/artikel-tentang', [ArtikelController::class, 'tentang']);
Route::get('/artikel-tim', [ArtikelController::class, 'tim']);
Route::get('/{slug}', [ArtikelController::class, 'artikel']);
Route::get('artikel-kategori/{slug}', [ArtikelController::class, 'kategori']);
Route::get('artikel-tag/{slug}', [ArtikelController::class, 'tag']);
Route::get('artikel-banner/{slug}', [ArtikelController::class, 'banner']);
Route::get('/artikel-author/{id}', [ArtikelController::class, 'author']);


