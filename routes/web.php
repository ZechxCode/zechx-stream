<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\MovieController;
use App\Http\Controllers\Admin\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('admin/login', [LoginController::class, 'index'])->name('admin.login');
Route::post('admin/login', [LoginController::class, 'authenticate'])->name('admin.login.auth');



Route::prefix('admin')->middleware('admin.auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::prefix('movie')->controller(MovieController::class)->group(function () {
        Route::get('/', 'index')->name('admin.movie');

        Route::get('/create', 'create')->name('admin.movie.create');
        Route::post('/store', 'store')->name('admin.movie.store');

        Route::get('/edit/{id}', 'edit')->name('admin.movie.edit');
        Route::put('/update/{id}', 'update')->name('admin.movie.update');

        Route::delete('/destroy/{id}', 'destroy')->name('admin.movie.destroy');
    });
});
