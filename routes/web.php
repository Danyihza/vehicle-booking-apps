<?php

use App\Http\Controllers\Admin\BookingController as AdminBookingController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\VehicleController as AdminVehicleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\User\BookingController;
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
Route::get('/signin', [AuthController::class, 'index'])->name('auth.signin');
Route::get('/signout', [AuthController::class, 'signout'])->name('auth.signout');
Route::post('/signin', [AuthController::class, 'signin'])->name('auth.signin.post');

Route::group(['as' => 'user.', 'middleware' => 'isUser'], function () {
    Route::get('/', [BookingController::class, 'index'])->name('booking');
});

Route::group(['as' => 'admin.', 'prefix' => 'admin', 'middleware' => 'isAdmin'], function () {
    Route::get('/', [AdminDashboardController::class, 'index'])->name('dashboard');
    Route::group(['as' => 'vehicles.', 'prefix' => 'vehicles'], function(){
        Route::get('/', [AdminVehicleController::class, 'index'])->name('index');
        Route::post('/', [AdminVehicleController::class, 'post'])->name('post');
        Route::put('/update/{id}', [AdminVehicleController::class, 'update'])->name('update');
        Route::get('/delete/{id}', [AdminVehicleController::class, 'delete'])->name('delete');
    });

    // Route::resource('bookings', AdminBookingController::class);
    Route::group(['as' => 'bookings.', 'prefix' => 'bookings'], function(){
        Route::get('/', [AdminBookingController::class, 'index'])->name('index');
        Route::post('/', [AdminBookingController::class, 'post'])->name('post');
        Route::get('/approval', [AdminBookingController::class, 'approval'])->name('approval');
        Route::get('/export', [AdminBookingController::class, 'exportToExcel'])->name('export');
    });
    
});