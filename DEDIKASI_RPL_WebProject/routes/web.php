<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfilePesertaController;

Route::get('/', function () {
    return view('register')->name('viewRegister');
});

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

Route::get('/profil-peserta', [ProfilePesertaController::class, 'show_profile'])->name('profil-peserta');



Route::post('/login', [LoginController::class, 'index'])->name('login');

Route::get("/Progress-Peserta" , function(){
    return view("peserta/progress");})->name('progress');
Route::get("/admin" , function(){
    return view("dashboard/admin_dashboard");})->name('dash-admin');
    Route::get("/admin/manage-course" , function(){
        return view("admin/managePelatihan");})->name('manage-course');
Route::get("/dashboard-peserta" , function(){
            return view("dashboard/student_dashboard");})->name('');
    
