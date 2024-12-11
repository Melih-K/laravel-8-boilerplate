<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CariController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OfferController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\UsersController;



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
    return redirect()->action([HomeController::class, 'index']);
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('/user', [UsersController::class, 'index'])->name('user.index');


Route::get('/stock', [StockController::class, 'index'])->name('stock.index');
Route::get('/stocks/images/{id}', [StockController::class, 'stockImages']);
Route::delete('/stocks/images/{imageId}', [StockController::class, 'destroyImage'])->name('stocks.destroyImage');
Route::post('/stock/quick-add', [StockController::class, 'quickAdd'])->name('stock.quick_add');

Route::get('/cari', [CariController::class, 'index'])->name('cari.index');
Route::post('/cari/quick-add', [CariController::class, 'quickAdd'])->name('cari.quick_add');
Route::get('/get-addresses/{cari_id}', [CariController::class, 'getAddresses'])->name('get.addresses');
Route::get('/get-address/{id}', [CariController::class, 'getAddress']);
Route::delete('/delete-address/{address_id}', [CariController::class, 'deleteAddress'])->name('delete.address');
Route::post('/store-address', [CariController::class, 'storeAddress'])->name('cari.storeAddress');

Route::get('/offer_add', [OfferController::class, 'indexAdd'])->name('offer.add');
Route::get('/offer/{id}/edit', [OfferController::class, 'edit'])->name('offer.edit');

Route::get('/offers', [OfferController::class, 'index'])->name('offer.index');
Route::get('/cariler', [OfferController::class, 'getCariler'])->name('cariler.get');

// Route::get('/user.get_data',[UserController::class, 'get_data'])->name('get_data');
Route::resource('users', UsersController::class);
Route::resource('stocks', StockController::class);
Route::resource('cari', CariController::class);
Route::resource('offers', OfferController::class);




