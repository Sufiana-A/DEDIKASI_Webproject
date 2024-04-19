<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileAdminController;
use App\Http\Controllers\ProfileMentorController;
use App\Http\Controllers\ProfilePesertaController;
use App\Http\Controllers\PelatihanController;
use App\Http\Controllers\AdminCourseController;
use App\Http\Controllers\StudentDashboardController;


Route::get('/', function () {
    return view('register');
})->name('viewRegister');

Route::controller(PelatihanController::class)->group(function () {
    Route::get('pelatihan/list/page', 'pelatihanList')->middleware('auth')->name('pelatihan/list/page'); // pelatihan/list/page
    Route::get('pelatihan/add/page', 'pelatihanAdd')->middleware('auth')->name('pelatihan/add/page'); // pelatihan/add/page
    Route::post('pelatihan/save', 'savePelatihan')->name('pelatihan/save'); // pelatihan/save
    Route::post('pelatihan/update', 'updatePelatihan')->name('pelatihan/update'); // pelatihan/update
    Route::post('pelatihan/delete', 'deletePelatihan')->name('pelatihan/delete'); // pelatihan/delete
    Route::get('pelatihan/edit/{id_pelatihan}', 'pelatihanEdit'); // pelatihan/edit/page
});

    

//Route::get('/register', [RegisterController::class, 'register']);
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
    Route::get('/manage-course', 'index')->name('manageCourse.index');
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