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
use App\Http\Controllers\FrontEndController;

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
//     return view('home');
// })->name('home');

Route::get('/', [FrontEndController::class, 'indexAll'])->name('home');

Route::get('/new-pray-requests', [PrayerRequestController::class, 'create']);

Route::get('/new-alumni', [AlumniController::class, 'createform']);
Route::get('/check-alumni', [AlumniController::class, 'nameBirthdate']);
Route::get('/check-alumni-validate', [AlumniController::class, 'checkBirthdate'])->name('alumnis.checkBirthdate');

Route::prefix('admin')->group(function () {
    Route::get('/students/export_excel', [StudentController::class, 'export_excel'])->name('students.export_excel');
    Route::post('/students/import_excel', [StudentController::class, 'import_excel'])->name('students.import_excel');
    Route::resource('/students', StudentController::class);

    Route::get('/lecturers/export_excel', [LecturerController::class, 'export_excel'])->name('lecturers.export_excel');
    Route::post('/lecturers/import_excel', [LecturerController::class, 'import_excel'])->name('lecturers.import_excel');
    Route::resource('/lecturers', LecturerController::class);

    Route::get('/alumnis/export_excel', [AlumniController::class, 'export_excel'])->name('alumnis.export_excel');
    Route::post('/alumnis/import_excel', [AlumniController::class, 'import_excel'])->name('alumnis.import_excel');
    Route::put('/alumnis/updateAvatar/{alumni}', [AlumniController::class, 'updateAvatar'])->name('alumnis.updateAvatar');
    Route::resource('/alumnis', AlumniController::class);

    Route::resource('/events', EventController::class);

    Route::resource('/counselors', CounselorController::class);
    
    Route::resource('/organizational-records', OrganizationalRecordController::class);

    Route::resource('/prayer-requests', PrayerRequestController::class);
    
    Route::resource('/users-events', UserEventController::class);
    
    Route::resource('/birthday', BirthdayController::class);

    Route::resource('/users', UserController::class);

    Route::resource('/counselings', CounselingController::class);

    Route::resource('/profiles', ProfileController::class);
    Route::get('/profiles/{student}/editStudent', [ProfileController::class, 'editStudent'])->name('profiles.editStudent');
    Route::get('/profiles/{alumni}/editAlumni', [ProfileController::class, 'editAlumni'])->name('profiles.editAlumni');
    Route::get('/profiles/{lecturer}/editLecturer', [ProfileController::class, 'editLecturer'])->name('profiles.editLecturer');

    Route::get('/events/{event}/attend', [EventController::class, 'showAttend'])->name('events.showAttend');
    Route::get('/events/{event}/finnish', [EventController::class, 'finnish'])->name('events.finnish');

    Route::resource('/roles', RoleManagementController::class);
    Route::put('/users/updateAvatar/{user}', [UserController::class, 'updateAvatar'])->name('users.updateAvatar');
    Route::put('/users/updatePassword/{user}', [UserController::class, 'updatePassword'])->name('users.updatePassword');
    Route::put('/users/updateImage/{event}', [EventController::class, 'updateImage'])->name('events.updateImage');

    Route::resource('/roles', RoleController::class);
    Route::resource('/posts', PostController::class);
    Route::resource('/alumnis', AlumniController::class);

    Route::get('/landingPageHome', [FrontEndController::class, 'indexHome'])->name('landingPage.indexHome');
    Route::get('/landingPageHome/create', [FrontEndController::class, 'createHome'])->name('landingPage.createHome');
    Route::post('/landingPageHome', [FrontEndController::class, 'storeHome'])->name('landingPage.storeHome');
    Route::get('/landingPageHome/{home}', [FrontEndController::class, 'showHome'])->name('landingPage.showHome');
    Route::get('/landingPageHome/{home}/edit', [FrontEndController::class, 'editHome'])->name('landingPage.editHome');
    Route::put('/landingPageHome/{home}', [FrontEndController::class, 'updateHome'])->name('landingPage.updateHome');
    Route::put('/landingPageHome/updateAvatar/{home}', [FrontEndControllerController::class, 'updateHomeAvatar'])->name('landingPage.updateHomeAvatar');
    Route::delete('/landingPageHome/{home}', [FrontEndController::class, 'destroyHome'])->name('landingPage.deleteHome');

    Route::get('/landingPageVisiMisi', [FrontEndController::class, 'indexVisiMisi'])->name('landingPage.indexVisiMisi');
    Route::get('/landingPageVisiMisi/create', [FrontEndController::class, 'createVisiMisi'])->name('landingPage.createVisiMisi');
    Route::post('/landingPageVisiMisi', [FrontEndController::class, 'storeVisiMisi'])->name('landingPage.storeVisiMisi');
    Route::get('/landingPageVisiMisi/{VisiMisi}', [FrontEndController::class, 'showVisiMisi'])->name('landingPage.showVisiMisi');
    Route::get('/landingPageVisiMisi/{VisiMisi}/edit', [FrontEndController::class, 'editVisiMisi'])->name('landingPage.editVisiMisi');
    Route::put('/landingPageVisiMisi/{VisiMisi}', [FrontEndController::class, 'updateVisiMisi'])->name('landingPage.updateVisiMisi');
    Route::delete('/landingPageVisiMisi/{VisiMisi}', [FrontEndController::class, 'destroyVisiMisi'])->name('landingPage.deleteVisiMisi');

    Route::get('/landingPageAbout', [FrontEndController::class, 'indexAbout'])->name('landingPage.indexAbout');
    Route::get('/landingPageAbout/create', [FrontEndController::class, 'createAbout'])->name('landingPage.createAbout');
    Route::post('/landingPageAbout', [FrontEndController::class, 'storeAbout'])->name('landingPage.storeAbout');
    Route::get('/landingPageAbout/{about}', [FrontEndController::class, 'showAbout'])->name('landingPage.showAbout');
    Route::get('/landingPageAbout/{about}/edit', [FrontEndController::class, 'editAbout'])->name('landingPage.editAbout');
    Route::put('/landingPageAbout/{about}', [FrontEndController::class, 'updateAbout'])->name('landingPage.updateAbout');
    Route::put('/landingPageAbout/updateAvatar/{about}', [FrontEndControllerController::class, 'updateAboutAvatar'])->name('landingPage.updateAboutAvatar');
    Route::delete('/landingPageAbout/{about}', [FrontEndController::class, 'destroyAbout'])->name('landingPage.deleteAbout');

    Route::get('/landingPageRenungan', [FrontEndController::class, 'indexRenungan'])->name('landingPage.indexRenungan');
    Route::get('/landingPageRenungan/create', [FrontEndController::class, 'createRenungan'])->name('landingPage.createRenungan');
    Route::post('/landingPageRenungan', [FrontEndController::class, 'storeRenungan'])->name('landingPage.storeRenungan');
    Route::get('/landingPageRenungan/{renungan}', [FrontEndController::class, 'showRenungan'])->name('landingPage.showRenungan');
    Route::get('/landingPageRenungan/{renungan}/edit', [FrontEndController::class, 'editRenungan'])->name('landingPage.editRenungan');
    Route::put('/landingPageRenungan/{renungan}', [FrontEndController::class, 'updateRenungan'])->name('landingPage.updateRenungan');
    Route::put('/landingPageRenungan/updateAvatar/{renungan}', [FrontEndControllerController::class, 'updateRenunganAvatar'])->name('landingPage.updateRenunganAvatar');
    Route::delete('/landingPageRenungan/{renungan}', [FrontEndController::class, 'destroyRenungan'])->name('landingPage.deleteRenungan');
});

Route::get('/events/{slug}', [EventController::class, 'showSlug'])->name('events.showSlug');
Route::get('/attends/{slug}', [EventController::class, 'attendView'])->name('events.attendView');
Route::put('/events/{event}', [EventController::class, 'attend'])->name('events.attend');