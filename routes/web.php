<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\CounselorController;
use App\Http\Controllers\PrayerRequestController;
use App\Http\Controllers\OrganizationalRecordController;
use App\Http\Controllers\CounselingController;
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
    return view('home');
});

Route::prefix('admin')->group(function () {
    Route::resource('/students', StudentController::class);
    Route::resource('/counselors', CounselorController::class);
    Route::resource('/lecturers', LecturerController::class);
    Route::resource('/organizational-records', OrganizationalRecordController::class);
    Route::resource('/prayer-requests', PrayerRequestController::class);
    Route::resource('/alumnis', AlumniController::class);
    Route::resource('/users', UserController::class);
    Route::resource('/counselings', CounselingController::class);
    Route::resource('/profiles', ProfileController::class);
    Route::get('/profiles/{student}/editStudent', [ProfileController::class, 'editStudent'])->name('profiles.editStudent');
});
