<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileAdminController;
use App\Http\Controllers\ProfileMentorController;
use App\Http\Controllers\ProfilePesertaController;
use App\Http\Controllers\PelatihanController;
use App\Http\Controllers\PesertaPelatihanController;
use App\Http\Controllers\AdminCourseController;
use App\Http\Controllers\StudentDashboardController;

use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\VideoController;

use App\Http\Controllers\CertificateController;


use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Route::get('/', function () {
    return view('video/mentor/video-list');
})->name('listvideo_view');

Route::controller(PelatihanController::class)->group(function () {
    Route::get('pelatihan/list/page', 'pelatihanList')->middleware('auth')->name('pelatihan/list/page'); // pelatihan/list/page
    Route::get('pelatihan/add/page', 'pelatihanAdd')->middleware('auth')->name('pelatihan/add/page'); // pelatihan/add/page
    Route::post('pelatihan/save', 'savePelatihan')->name('pelatihan/save'); // pelatihan/save
    Route::post('pelatihan/update', 'updatePelatihan')->name('pelatihan/update'); // pelatihan/update
    Route::post('pelatihan/delete', 'deletePelatihan')->name('pelatihan/delete'); // pelatihan/delete
    Route::get('pelatihan/edit/{id_pelatihan}', 'pelatihanEdit'); // pelatihan/edit/page
});

    

Route::get('/register', [RegisterController::class, 'register'])->name('viewRegister');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/loginsubmit', [LoginController::class, 'loginvalid'])->name('loginsubmit');
Route::post('/login', [LoginController::class, 'index'])->name('login');

Route::get("/Progress-Peserta" , function(){
    return view("peserta/progress");})->name('progress');
Route::get("/admin" , function(){
    return view("dashboard/admin_dashboard");})->name('dash-admin');
Route::get("/admin/manage-course" , function(){
    return view("admin/managePelatihan");})->name('manage-course');
Route::get("/dashboard-peserta" , function(){
    return view("dashboard/student_dashboard");})->name('');

//peserta
Route::get('/profile-peserta', [ProfilePesertaController::class, 'show_profile'])->name('profile_peserta');
Route::get('/profile-peserta-edit', [ProfilePesertaController::class, 'edit_profile'])->name('profile_edit_peserta');
Route::post('/profile-peserta-submit', [ProfilePesertaController::class, 'submit_profile'])->name('profile_submit_peserta');
Route::post('/profile-photo-peserta-submit', [ProfilePesertaController::class, 'submit_photo'])->name('profil_photo_submit_peserta');

//peserta pelaihan
Route::get('/peserta-pelatihan', [PesertaPelatihanController::class, 'index'])->name('list_peserta_pelatihan');

//mentor

//Mentor Dashboard
Route::get("/mentor" , function(){
    return view("dashboard/mentor_dashboard");})->name('dash-mentor');
Route::get("/mentor/nilai" , function(){
        return view("mentor/manageNilai");})->name('manage-nilai');

Route::get('/profile-mentor', [ProfileMentorController::class, 'show_profile'])->name('profile_mentor');
Route::get('/profile-mentor-edit', [ProfileMentorController::class, 'edit_profile'])->name('profile_edit_mentor');
Route::post('/profile-mentor-submit', [ProfileMentorController::class, 'submit_profile'])->name('profile_submit_mentor');
Route::post('/profile-photo-mentor-submit', [ProfileMentorController::class, 'submit_photo'])->name('profil_photo_submit_mentor');




//admin
Route::get('/profile-admin', [ProfileAdminController::class, 'show_profile'])->name('profile_admin');
Route::get('/profile-admin-edit', [ProfileAdminController::class, 'edit_profile'])->name('profile_edit_admin');
Route::post('/profile-admin-submit', [ProfileAdminController::class, 'submit_profile'])->name('profile_submit_admin');
Route::post('/profile-photo-admin-submit', [ProfileAdminController::class, 'submit_photo'])->name('profil_photo_submit_admin');

Route::controller(AdminCourseController::class)->name('admin.')->prefix('admin')->group(function () {
    Route::get('manage-course', 'index')->name('manageCourse.index');
    Route::get('admin/manage-course/add', 'addCourse')->name('manageCourse.add');
    Route::post('/manage-course/store', 'store')->name('manageCourse.store');
    Route::get('admin/manage-course/edit/{id}', 'editCourse')->name('manageCourse.edit');
    Route::post('admin/manage-course/update', 'update')->name('manageCourse.update');
    Route::post('/manage-course/delete', 'delete')->name('manageCourse.delete');
});
Route::controller(StudentDashboardController::class)->name('student.')->group(function () {
    Route::get('/dashboard-peserta', 'index')->name('dashboard.index');
    Route::get('/course/{id}', 'showCourse')->name('dashboard.course');
});

//assignment admin
Route::get('/list-assignment', [AssignmentController::class, 'index'])->name('assignment_mentor');
Route::get('/create-assignment', [AssignmentController::class, 'create'])->name('assignment_create');
Route::post('/store-assignment', [AssignmentController::class, 'store'])->name('assignment_store');
Route::post('/update-assignment', [AssignmentController::class, 'update'])->name('assignment_update');
Route::get('/delete-assignment', [AssignmentController::class, 'destroy'])->name('assignment_delete');


//assignment peserta
Route::get('/peserta-list-assignment', [AssignmentController::class, 'indexPeserta'])->name('add_assignment');
Route::get('/peserta-create-assignment', [AssignmentController::class, 'createPeserta'])->name('create_assignment');
Route::post('/peserta-submit-assignment', [AssignmentController::class, 'submit'])->name('submit_assignment');
Route::post('/peserta-update-assignment', [AssignmentController::class, 'updatePeserta'])->name('update_assignment');

//video admin
Route::get('/list-video', [VideoController::class, 'index'])->name('video_mentor');
Route::get('/create-video', [VideoController::class, 'create'])->name('video_create');
Route::post('/store-video', [VideoController::class, 'store'])->name('video_store');


// sertifikat
Route::resource('/sertifikat', CertificateController::class);

