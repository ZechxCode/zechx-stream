<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MovieController;
use Illuminate\Support\Facades\Route;

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



Route::prefix('admin')->group(function () {
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
