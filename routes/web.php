<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\HostingController;
use App\Http\Controllers\StokController;
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

//Route::get('/', function () {
//	$nama = 'Fendi';
//    return view('index', ['nama' => $nama]);
//});
//Route::get('/about', function () {
//	$nama = 'Fendi';
//    return view('about', ['nama' => $nama]);
//});
Route::get('/', [PagesController::class, 'home']);
Route::get('/hosting', [HostingController::class, 'index']);
Route::get('/stok', [StokController::class, 'home']);
Route::get('/stokview', [StokController::class, 'index']);
Route::get('/history/{id_barang}', [StokController::class, 'show']);
Route::get('/historytrans', [StokController::class, 'showtrans']);
Route::get('/outview', [StokController::class, 'outstok']);
Route::get('/inview', [StokController::class, 'instok']);
Route::get('/formtransaksi', [StokController::class, 'createtrans'])->name('createtrans');
Route::get('/formaddin', [StokController::class, 'createin'])->name('createin');
Route::post('/addTrans', [StokController::class, 'storetrans'])->name('addTrans');
Route::post('/addIn', [StokController::class, 'storein'])->name('addIn');
Route::get('/testpage', [StokController::class, 'testpage']);
Route::get('/formadd', [StokController::class, 'formadd'])->name('formadd');
Route::post('/addbarang', [StokController::class, 'addbarang'])->name('addbarang');
Route::get('/print/{id_barang}', [StokController::class, 'print']);
Route::get('/formtrans', [StokController::class, 'createtrans'])->name('formtrans');
Route::post('/addtrans', [StokController::class, 'storetrans'])->name('addtrans');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
