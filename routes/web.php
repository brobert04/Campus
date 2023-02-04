<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Backend\UserController;
use App\Http\Controllers\Backend\ProfileController;

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
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.pages.dashboard');
    })->name('dashboard');
});

//RUTELE ADMINULUI/DIRECTORULUI PENTRU ADAUGARE UTILIZATOR
Route::group(['prefix' => 'admin', 'middleware' => ['auth:sanctum']], function(){
    Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
    Route::resource('users', UserController::class);
});

//RUTELE PENTRU PROFIL
Route::group(['prefix' => 'profile', 'middleware' => ['auth:sanctum']], function(){
    Route::get('/', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/settings', [ProfileController::class, 'settings'])->name('profile.settings');
    Route::post('/update', [ProfileController::class, 'update'])->name('profile.update');
});
