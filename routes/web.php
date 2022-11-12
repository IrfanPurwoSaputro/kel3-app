<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;


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


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, 'index']);

Route::get('/about', [HomeController::class, 'about']);

Route::get('/detail_informasi/{slug}', [HomeController::class, 'detail_informasi']);


Route::resource('booking', OrderController::class);

Route::get('/find_code', [OrderController::class,'find_code']);

Route::resource('pengaduan', PengaduanController::class);

Route::post('/store_prov', [OrderController::class,'store_provinces']);

Route::get('/payment', [OrderController::class,'payment']);



Route::get('/template/charts', [PageController::class, 'charts']);

Route::get('/template/documentation', [PageController::class, 'documentation']);

Route::get('/template/basic_elements', [PageController::class, 'basic_elements']);

Route::get('/template/mdi', [PageController::class, 'mdi']);

Route::get('/template/error_404', [PageController::class, 'error_404']);

Route::get('/template/error_500', [PageController::class, 'error_500']);

Route::get('/template/basic_table', [PageController::class, 'basic_table']);

Route::get('/template/buttons', [PageController::class, 'buttons']);

Route::get('/template/dropdowns', [PageController::class, 'dropdowns']);

Route::get('/template/typhography', [PageController::class, 'typhography']);


/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
*/
Auth::routes();
Route::get('/admin', [AdminController::class, 'index']);
Route::get('/informasi_list', [AdminController::class, 'informasiList']);
Route::get('/informasi_create', [AdminController::class, 'createInformasi']);
Route::get('/informasi_edit/{id}', [AdminController::class, 'editInformasi']);
Route::post('/informasi_store', [AdminController::class, 'storeInformasi']);
Route::post('/informasi_update/{id}', [AdminController::class, 'updateInformasi']);
Route::get('/informasi_delete/{id}', [AdminController::class, 'deleteInformasi']);
Route::get('/pengaduan_list', [AdminController::class, 'pengaduanIndex']);
Route::get('/booking_list', [AdminController::class, 'bookingTiketList']);
Route::get('/booking_list_detail/{id}', [AdminController::class, 'getDetailBooking']);
Route::get('/booking_list_update/{id}', [AdminController::class, 'updateStatusBooking']);
Route::get('/admin_suhu_ngawi_get', [AdminController::class, 'getCuacaCelciusBmkg']);
Route::get('/admin/login', [PageController::class, 'login']);
Route::post('/admin/login', [LoginController::class, 'LoginManual']);
/*
|--------------------------------------------------------------------------
| End Admin Routes
|--------------------------------------------------------------------------
|
*/