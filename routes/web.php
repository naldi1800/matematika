<?php

// use App\Http\Controllers\AuthController;

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SoalController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ViewUserController;
use Illuminate\Support\Facades\Auth;
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





// Get : getting item
// Post: post and create
// Put : post and change
// Delete: Delete
Auth::routes();


Route::middleware(['auth', 'user-role:admin'])->group(function () {

    Route::get('/', [HomeController::class, 'adminHome'])->name('home');
    Route::get('/home', [HomeController::class, 'adminHome'])->name('home');

    //   Start Soal
    Route::get('/soal', [SoalController::class, 'index']);
    Route::get('/soal/create', [SoalController::class, 'create']);
    Route::get('/soal/{id}/update', [SoalController::class, 'update']);
    Route::post('/soal/save', [SoalController::class, 'save']);
    Route::put('/soal/{id}', [SoalController::class, 'edit']);
    Route::delete('/soal/{id}', [SoalController::class, 'delete']);
    //  End Soal

    //  Start Materi
    Route::get('/materi', [MateriController::class, 'index']);
    //  End Materi
    Route::get('/userdata', [UserController::class, 'user']);
    Route::post('/userdata/{id}/deleteskor', [UserController::class, 'deleteSkor']);
});

Route::middleware(['auth', 'user-role:user'])->group(function () {
    //Start User
    Route::get('/user', [HomeController::class, 'userHome'])->name('home.user');
    Route::get('/user/home', [HomeController::class, 'userHome'])->name('home.user');

    // Soal
    Route::get('/user/soal/{number}', [ViewUserController::class, 'soal']);
    Route::post('/user/soal/{number}/next', [ViewUserController::class, 'soalNext']);
    Route::get('/user/soal', [ViewUserController::class, 'soal']);
    Route::post('/user/save/soal/', [ViewUserController::class, 'save']);

    //penjelasan
    Route::get('/user/penjelasan/{number}', [ViewUserController::class, 'showAnswer']);
    Route::get('/user/penjelasan', [ViewUserController::class, 'showAnswer']);

    //materi
    Route::get('/user/materi', [ViewUserController::class, 'materi']);

    //End User
});
