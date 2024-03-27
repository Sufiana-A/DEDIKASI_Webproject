<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfilePesertaController;

Route::get('/', function () {
    return view('register');
})->name('viewRegister');

//Route::get('/register', [RegisterController::class, 'register']);
Route::post('/register', [RegisterController::class, 'register'])->name('register');

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/loginsubmit', [LoginController::class, 'loginvalid'])->name('loginsubmit');

Route::get('/profil-peserta', [ProfilePesertaController::class, 'show_profile'])->name('profil-peserta');



Route::post('/login', [LoginController::class, 'index'])->name('login');

