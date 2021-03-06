<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\FasilitasKamarController;
use App\Http\Controllers\TipeKamarController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\ResepsionisController;

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

Route::group(['middleware' => 'prevent.back.history'], function(){

Route::get('/', function () {
    return redirect()->route('landingpage');
});

Route::get('/', [GuestController::class, 'index'])->name('landingpage');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function(){
    Route::group(['middleware' => 'admin'], function(){
        Route::get('/admin/home', [AdminController::class, 'index'])->name('admin.home');
        Route::resource('fasilitasKamar', FasilitasKamarController::class);
        Route::resource('tipeKamar', TipeKamarController::class);
        Route::resource('kamar', KamarController::class);
    });
    Route::group(['middleware' => 'resepsionis'], function(){
        Route::get('/receptionis/home', [ResepsionisController::class, 'index'])->name('receptionis.home');
        Route::get('/receptionis/list', [ResepsionisController::class, 'transaction'])->name('receptionis.list');
        Route::get('/receptionis/logs', [ResepsionisController::class, 'logs'])->name('receptionis.logs');
        Route::get('/recpetionis/dibayar/{id}', [ResepsionisController::class, 'dibayar'])->name('receptionis.dibayar');
        Route::get('/recpetionis/diverifikasi/{id}', [ResepsionisController::class, 'diverifikasi'])->name('receptionis.diverifikasi');
        Route::get('/receptionis/checkedIn/{id}', [ResepsionisController::class, 'checkedIn'])->name('receptionis.checkedIn');
        Route::get('/receptionis/checkedOut/{id}', [ResepsionisController::class, 'checkedOut'])->name('receptionis.checkedOut');
    });
    Route::group(['middleware' => 'customer'], function(){
        Route::get('/customer/home', [CustomerController::class, 'index'])->name('customer.home');
        Route::post('/customer/book', [CustomerController::class, 'booking'])->name('customer.booking');
        Route::get('/customer/bayar', [CustomerController::class, 'bayar'])->name('customer.bayar');
        Route::get('/customer/invoice', [CustomerController::class, 'invoice'])->name('customer.invoice');
        Route::get('/customer/pay/{id}', [CustomerController::class, 'transactionPay'])->name('customer.pay');
        Route::get('/customer/cancel/{id}', [CustomerController::class, 'transactionCancel'])->name('customer.cancel');
        Route::get('/customer/list', [CustomerController::class, 'transactionList'])->name('customer.list');
        Route::get('/customer/receipt/{id}', [CustomerController::class, 'receipt'])->name('customer.receipt');
        // Route::get('/customer/print/{id}', [CustomerController::class, 'exportPDF'])->name('customer.print');
        Route::get('/download/pdf/{id}', [CustomerController::class, 'print'])->name('customer.pdf');
    });
});

Route::prefix('room')->group(function(){
    Route::get('/detail-room/{id}', [GuestController::class, 'detail'])->name('detail');
});

}); // end prevent
