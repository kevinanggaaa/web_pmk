<?php

use App\Models\Event;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\CounselorController;
use App\Http\Controllers\UserEventController;
use App\Http\Controllers\CounselingController;
use App\Http\Controllers\PrayerRequestController;
use App\Http\Controllers\OrganizationalRecordController;

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
    Route::resource('/events', EventController::class);
    Route::resource('/lecturers', LecturerController::class);
    Route::resource('/organizational-records', OrganizationalRecordController::class);
    Route::resource('/prayer-requests', PrayerRequestController::class);
    Route::resource('/users-events', UserEventController::class);
    Route::resource('/alumnis', AlumniController::class);
    Route::resource('/users', UserController::class);
    Route::resource('/counselings', CounselingController::class);
    Route::resource('/profiles', ProfileController::class);
    Route::get('/profiles/{student}/editStudent', [ProfileController::class, 'editStudent'])->name('profiles.editStudent');
    Route::get('/profiles/{alumni}/editAlumni', [ProfileController::class, 'editAlumni'])->name('profiles.editAlumni');
    Route::get('/profiles/{lecturer}/editLecturer', [ProfileController::class, 'editLecturer'])->name('profiles.editLecturer');
    Route::get('/events/{event}/attend', [EventController::class, 'showAttend'])->name('events.showAttend');
    Route::get('/events/{event}/finnish', [EventController::class, 'finnish'])->name('events.finnish');
    Route::resource('/roles', RoleManagementController::class);

    Route::resource('/banners', BannerController::class);

    Route::resource('/posts', PostController::class);
    Route::get('/events/slug/{slug}', [EventController::class, 'showSlug'])->name('events.showSlug');
});
