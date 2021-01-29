<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\PrayerRequestController;

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
    return view('mahasiswa/coba');
});

// Route::get('/', function () {
//     return view('landing_template');
// });

Route::prefix('admin')->group(function () {
	Route::resource('/alumnis', AlumniController::class);
});

Route::prefix('admin')->group(function () {
	Route::resource('/prayer-requests', PrayerRequestController::class);
});
