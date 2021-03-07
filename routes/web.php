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
use App\Http\Controllers\RoleController;
use App\Http\Controllers\OrganizationalRecordController;
use App\Http\Controllers\BirthdayController;

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
})->name('home');

Route::get('/new-pray-requests', [PrayerRequestController::class, 'create']);

Route::prefix('admin')->group(function () {
    Route::get('/students/export_excel', [StudentController::class, 'export_excel'])->name('students.export_excel');
    Route::post('/students/import_excel', [StudentController::class, 'import_excel'])->name('students.import_excel');
    Route::resource('/students', StudentController::class);
    

    Route::resource('/counselors', CounselorController::class);
    Route::get('/lecturers/export_excel', [LecturerController::class, 'export_excel'])->name('lecturers.export_excel');
    Route::post('/lecturers/import_excel', [LecturerController::class, 'import_excel'])->name('lecturers.import_excel');
    Route::resource('/events', EventController::class);
    Route::resource('/lecturers', LecturerController::class);
    

    Route::resource('/organizational-records', OrganizationalRecordController::class);
    Route::resource('/prayer-requests', PrayerRequestController::class);
    Route::get('/alumnis/export_excel', [AlumniController::class, 'export_excel'])->name('alumnis.export_excel');
    Route::post('/alumnis/import_excel', [AlumniController::class, 'import_excel'])->name('alumnis.import_excel');

    Route::resource('/users-events', UserEventController::class);
    Route::resource('/alumnis', AlumniController::class);

    Route::resource('/birthday', BirthdayController::class);
    Route::resource('/users', UserController::class);
    Route::resource('/counselings', CounselingController::class);
    Route::resource('/profiles', ProfileController::class);
    Route::get('/profiles/{student}/editStudent', [ProfileController::class, 'editStudent'])->name('profiles.editStudent');
    Route::get('/profiles/{alumni}/editAlumni', [ProfileController::class, 'editAlumni'])->name('profiles.editAlumni');
    Route::get('/profiles/{lecturer}/editLecturer', [ProfileController::class, 'editLecturer'])->name('profiles.editLecturer');
    Route::get('/events/{event}/finnish', [EventController::class, 'finnish'])->name('events.finnish');
    Route::resource('/roles', RoleManagementController::class);
    Route::put('/users/updateAvatar/{user}', [UserController::class, 'updateAvatar'])->name('users.updateAvatar');


    Route::resource('/roles', RoleController::class);
    Route::resource('/banners', BannerController::class);

    Route::resource('/posts', PostController::class);
    
});

Route::get('/events/{slug}', [EventController::class, 'showSlug'])->name('events.showSlug');
Route::get('/attends/{slug}', [EventController::class, 'attendView'])->name('events.attendView');
Route::put('/events/{event}', [EventController::class, 'attend'])->name('events.attend');