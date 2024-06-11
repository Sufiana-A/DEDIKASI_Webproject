<?php

use App\Http\Controllers\FAQController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PelatihanController;
use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\AdminCourseController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\ProfileAdminController;
use App\Http\Controllers\ProfileMentorController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\MentorDashboardController;
use App\Http\Controllers\NilaiPesertaController;
use App\Http\Controllers\ProfilePesertaController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\PesertaPelatihanController;
use App\Http\Controllers\StudentDashboardController;
use App\Http\Controllers\RegistrasiPelatihanController;
use App\Http\Controllers\TimelineController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\RekomendasiController;
use App\Http\Controllers\ShowAnnouncementController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;
use App\Http\Controllers\LokerController;


Route::get('/', function () {
    return view('register');
})->name('viewRegister');

// sertifikat
Route::resource('/sertifikat', CertificateController::class);
Route::get('/download/{fileName}', [CertificateController::class, 'download'])->name('sertifikat.download');

// FAQ
Route::get('/faqs/all', [FAQController::class, 'showAll'])->name('faqs.all');
Route::resource('/faqs', FAQController::class);

Route::get('/register', [RegisterController::class, 'register'])->name('viewRegister');
Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/loginsubmit', [LoginController::class, 'loginvalid'])->name('loginsubmit');
Route::post('/login', [LoginController::class, 'index'])->name('login');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get("/rekomendasi" , function(){
    return view("peserta/rekomendasi");})->name('progress');
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

//peserta pelaihan (PKD-22 & PKD-32)
Route::get('/peserta-pelatihan', [PesertaPelatihanController::class, 'index'])->name('list_peserta_pelatihan');
Route::post('/peserta-pelatihan/unenroll', [PesertaPelatihanController::class, 'unenroll'])->name('list_peserta_pelatihan_unenroll');

//Mentor Dashboard (PKD-51 & PKD-52)
Route::get('/dashboard-mentor', [MentorDashboardController::class, 'index'])->name('dashboard_mentor');

    Route::controller(NilaiController::class)->name('mentor.')->prefix('mentor')->group(function () {
        Route::get('manage-nilai', 'index')->name('manageNilai.index');
        Route::get('manage-nilai/add', 'addNilai')->name('manageNilai.add');
        Route::post('manage-nilai/store', 'store')->name('manageNilai.store');
        Route::get('manage-nilai/edit/{id}', 'edit')->name('manageNilai.edit');
        Route::post('manage-nilai/update/{id}', 'update')->name('manageNilai.update');
        Route::post('manage-nilai/delete', 'delete')->name('manageNilai.delete');
    });
// nilai peserta 
Route::get('/nilai-peserta', [NilaiPesertaController::class, 'index'])->name('nilai-peserta');


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
    // Route::get('/timeline/{id}', 'showTimeline')->name('dashboard.timeline');
});

//assignment mentor
Route::get('/list-assignment', [AssignmentController::class, 'index'])->name('assignment_mentor');
Route::get('/create-assignment', [AssignmentController::class, 'create'])->name('assignment_create');
Route::post('/store-assignment', [AssignmentController::class, 'store'])->name('assignment_store');
Route::get('/edit-assignment/{id}', [AssignmentController::class, 'edit'])->name('assignment_edit');
Route::post('/update-assignment/{id}', [AssignmentController::class, 'update'])->name('assignment_update');
Route::get('/delete-assignment', [AssignmentController::class, 'delete'])->name('assignment_delete');


//assignment peserta
Route::get('/peserta-list-assignment/{uuid}', [AssignmentController::class, 'indexPeserta'])->name('add_assignment');
Route::get('/peserta-create-assignment/{peserta_id}/{id_tugas}/{assignment_id}', [AssignmentController::class, 'createPeserta'])->name('create_assignment');
Route::get('/edit-submisi/{peserta_id}/{id_tugas}/{assignment_id}', [AssignmentController::class, 'editSubmit'])->name('submit_edit');
Route::post('/peserta-submit-assignment/{peserta_id}/{id_tugas}/{assignment_id}', [AssignmentController::class, 'submit'])->name('submit_assignment');
Route::post('/peserta-update-assignment/{peserta_id}/{id_tugas}/{assignment_id}', [AssignmentController::class, 'updatePeserta'])->name('update_assignment');
Route::get('/peserta-delete-assignment', [AssignmentController::class, 'deletePeserta'])->name('delete_assignment');

//video mentor
Route::get('/list-video', [VideoController::class, 'index'])->name('video_mentor');
Route::get('/create-video', [VideoController::class, 'create'])->name('video_create');
Route::post('/store-video', [VideoController::class, 'store'])->name('video_store');
Route::get('/edit-video/{id}', [VideoController::class, 'edit'])->name('video_edit');
Route::post('/update-video/{id}', [VideoController::class, 'update'])->name('video_update');
Route::get('/delete-video', [VideoController::class, 'delete'])->name('video_delete');

Route::get('/peserta-list-video/{uuid}', [VideoController::class, 'indexPeserta'])->name('video_peserta');


//dashboard admin
Route::get('/dashboard-admin', [AdminDashboardController::class, 'index'])->name('dashboard_admin');

//Seleksi admin
Route::get('/seleksi-peserta', [RegistrasiPelatihanController::class, 'showDaftarEnroll'])->name('seleksi_peserta');
Route::get('/seleksi-peserta-search', [RegistrasiPelatihanController::class, 'search'])->name('seleksi_peserta.search');
Route::get('/detail-seleksi/{id_peserta}/{course_id}', [RegistrasiPelatihanController::class, 'detailPesertaPelatihan'])->name('detail_seleksi_peserta');
Route::post('/submit-update/{id_peserta}/{course_id}', [RegistrasiPelatihanController::class, 'updateEnroll'])->name('submit_update_seleksi');

//Enroll Peserta
Route::get('/enroll-pelatihan/{id_peserta}/{id_course}', [RegistrasiPelatihanController::class, 'enrollPelatihan'])->name('enroll_pelatihan');
Route::post('/submit-enroll/{id_peserta}/{id_course}', [RegistrasiPelatihanController::class, 'store'])->name('submit_enroll_pelatihan');

//Materi Mentor
Route::get('/list-materi', [MateriController::class, 'index'])->name('materi_mentor');
Route::get('/list-materi-search', [MateriController::class, 'search'])->name('materi_search');
Route::get('/create-materi', [MateriController::class, 'create'])->name('materi_create');
Route::post('/store-materi', [MateriController::class, 'store'])->name('materi_store');
Route::get('/detail-materi/{id}', [MateriController::class, 'detailMateri'])->name('materi_detail');
Route::post('/update-materi/{id}', [MateriController::class, 'update'])->name('materi_update');
Route::get('/delete-materi', [MateriController::class, 'delete'])->name('materi_delete');

//timeline (PKD-31)
Route::get('/timeline', [TimelineController::class, 'index'])->name('timeline_index');
Route::get('/timeline/add', [TimelineController::class, 'add'])->name('timeline_add');
Route::get('/timeline/edit/{id}', [TimelineController::class, 'edit'])->name('timeline_edit');
Route::post('/timeline/store', [TimelineController::class, 'store'])->name('timeline_store');
Route::put('/timeline/{id}', [TimelineController::class, 'update'])->name('timeline_update');
Route::delete('/timeline/{id}', [TimelineController::class, 'delete'])->name('timeline_delete');

//materi peserta
Route::get('/peserta-view-materi/{uuid}', [MateriController::class, 'indexPeserta'])->name('view_materi');

//artikelAdmin
Route::get('/list-artikel', [ArtikelController::class, 'index'])->name('list_artikel');
Route::get('/add-artikel', [ArtikelController::class, 'create'])->name('add_artikel');
Route::post('/store-artikel', [ArtikelController::class, 'store'])->name('store_artikel');
Route::get('/edit-artikel/{id}', [ArtikelController::class, 'edit'])->name('edit_artikel');
Route::post('/update-artikel/{id}', [ArtikelController::class, 'update'])->name('update_artikel');
Route::get('/delete-artikel', [ArtikelController::class, 'delete'])->name('delete_artikel');

//peserta, mentor | artikel
Route::get('/peserta-artikel', [ArtikelController::class, 'indexView'])->name('peserta_artikel');
Route::get('/detail-artikel/{id}', [ArtikelController::class, 'detailView'])->name('detail_artikel');
Route::get('/mentor-artikel', [ArtikelController::class, 'indexMentor'])->name('mentor_artikel');
Route::get('/detail-mentor-artikel/{id}', [ArtikelController::class, 'detailMentor'])->name('detail_mentor');

//feedback
Route::get('/feedback-peserta', [FeedbackController::class, 'create_feedback'])->name('feedback_peserta');
Route::post('/feedback-peserta-submit/{id}', [FeedbackController::class, 'submit_feedback'])->name('feedback_peserta_submit');
Route::get('/feedback-sistem', [FeedbackController::class, 'show_feedback_sistem'])->name('feedback_sistem');
Route::get('/feedback-mentor', [FeedbackController::class, 'show_feedback_mentor'])->name('feedback_mentor');
Route::post('/filter-feedback-mentor', [FeedbackController::class, 'filter_feedback_mentor'])->name('filter_feedback_mentor');
Route::post('/filter-feedback-sistem', [FeedbackController::class, 'filter_feedback_sistem'])->name('filter_feedback_sistem');


// Announcement

Route::controller(AnnouncementController::class)->name('admin.')->prefix('admin')->group(function () {
    Route::get('manage-announcement', 'index')->name('manage.index');
    Route::get('manage-announcement/add', 'addAnnouncement')->name('manage.add');
    Route::post('manage-announcement/store', 'store')->name('manage.store');
    Route::get('manage-announcement/edit/{id}', 'editAnnouncement')->name('manage.edit');
    Route::post('manage-announcement/update', 'update')->name('manage.update');
    Route::post('manage-announcement/delete', 'delete')->name('manage.delete');
});
//peserta announcement

Route::get('announcements', [AnnouncementController::class, 'showAnnouncements'])->name('announcements.index');
Route::get('announcements/{id}', 'AnnouncementController@view')->name('announcements.view');
Route::delete('announcements/{id}', 'AnnouncementController@destroy')->name('announcements.destroy');
Route::get('/announcements', 'ShowAnnouncementController@index')->name('announcements.index');
Route::get('/announcements', 'AnnouncementController@showAnnouncements')->name('announcements.index');
Route::get('announcements', [AnnouncementController::class, 'showAnnouncements'])->name('announcements.index');
Route::get('announcements/{id}', [AnnouncementController::class, 'showAnnouncementDetail'])->name('announcements.view');

//loker admin
Route::get('/list-loker', [LokerController::class, 'index'])->name('loker_admin');
Route::get('/create-loker', [LokerController::class, 'create'])->name('loker_create');
Route::post('/store-loker', [LokerController::class, 'store'])->name('loker_store');
Route::get('/detail-loker/{id}', [LokerController::class, 'detailLoker'])->name('loker_detail');
Route::post('/update-loker/{id}', [LokerController::class, 'update'])->name('loker_update');
Route::get('/delete-loker', [LokerController::class, 'delete'])->name('loker_delete');

//loker peserta
Route::get('/peserta-view-loker', [LokerController::class, 'indexPeserta'])->name('view_loker');
Route::get('/peserta-view-loker-search', [LokerController::class, 'search'])->name('view_loker.search');

// REKOMENDASI
Route::get('/rekomendasi', [RekomendasiController::class, 'index'])->name('rekomendasi');
Route::middleware('auth:peserta')->group(function () {
    Route::get('/favorite', [RekomendasiController::class, 'showFavorite'])->name('favorite');
});
Route::post('/remove-favorite', [RekomendasiController::class, 'removeFavorite'])->name('remove-favorite');
Route::post('/save-checkbox', [RekomendasiController::class, 'saveCheckbox'])->name('save-checkbox');