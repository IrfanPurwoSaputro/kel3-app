<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PengaduanController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [HomeController::class, 'index']);

Route::get('/about', [HomeController::class, 'about']);

Route::get('/detail_informasi/{slug}', [HomeController::class, 'detail_informasi']);


// Route::get('/booking', [HomeController::class, 'booking']);

Route::resource('booking', OrderController::class);

Route::get('/find_code', [OrderController::class,'find_code']);

Route::resource('pengaduan', PengaduanController::class);

Route::post('/store_prov', [OrderController::class,'store_provinces']);

Route::get('/payment', [OrderController::class,'payment']);

// Route::post('/add_data_booking', [OrderController::class,'store']);

Route::get('/admin', [AdminController::class, 'index']);

Route::get('/admin/charts', [PageController::class, 'charts']);

Route::get('/admin/documentation', [PageController::class, 'documentation']);

Route::get('/admin/basic_elements', [PageController::class, 'basic_elements']);

Route::get('/admin/mdi', [PageController::class, 'mdi']);

Route::get('/admin/error_404', [PageController::class, 'error_404']);

Route::get('/admin/error_500', [PageController::class, 'error_500']);

Route::get('/admin/login', [PageController::class, 'login']);

Route::get('/admin/register', [PageController::class, 'register']);

Route::get('/admin/basic_table', [PageController::class, 'basic_table']);

Route::get('/admin/buttons', [PageController::class, 'buttons']);

Route::get('/admin/dropdowns', [PageController::class, 'dropdowns']);

Route::get('/admin/typhography', [PageController::class, 'typhography']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
