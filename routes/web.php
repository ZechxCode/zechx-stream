<?php

use App\Models\Transaction;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\MovieController;
use App\Http\Controllers\Member\PricingController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Member\RegisterController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Member\LoginController as MemberLoginController;
use App\Http\Controllers\Member\DashboardController as MemberDashboardController;
use App\Http\Controllers\Member\MovieController as MemberMovieController;


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
//Define member route here
Route::view('/', 'index');

Route::get('/register', [RegisterController::class, 'index'])->name('member.register');
Route::post('/register', [RegisterController::class, 'store'])->name('member.register.store');

Route::get('/login', [MemberLoginController::class, 'index'])->name('member.login');
Route::post('/login', [MemberLoginController::class, 'auth'])->name('member.login.auth');

Route::get('/pricing', [PricingController::class, 'index'])->name('pricing');

Route::prefix('member')->middleware('auth')->group(function () {
    Route::get('/', [MemberDashboardController::class, 'index'])->name('member.dashboard');
    Route::get('movie/{id}', [MemberMovieController::class, 'show'])->name('member.movie.detail');
    Route::get('movie/{id}/watch', [MemberMovieController::class, 'watch'])->name('member.movie.watch');

    // Route::get('test', function () {
    //     return 'Kamu Sudah Login';
    // });

});

//Admin
Route::get('admin/login', [LoginController::class, 'index'])->name('admin.login');
Route::post('admin/login', [LoginController::class, 'authenticate'])->name('admin.login.auth');

Route::prefix('admin')->middleware('admin.auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::post('/logout', [LoginController::class, 'logout'])->name('admin.login.logout');

    Route::prefix('movie')->controller(MovieController::class)->group(function () {
        Route::get('/', 'index')->name('admin.movie');

        Route::get('/create', 'create')->name('admin.movie.create');
        Route::post('/store', 'store')->name('admin.movie.store');

        Route::get('/edit/{id}', 'edit')->name('admin.movie.edit');
        Route::put('/update/{id}', 'update')->name('admin.movie.update');

        Route::delete('/destroy/{id}', 'destroy')->name('admin.movie.destroy');
    });

    Route::prefix('transaction')->controller(TransactionController::class)->group(function () {
        Route::get('/', 'index')->name('admin.transaction');
    });
});
