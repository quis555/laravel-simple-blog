<?php

use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\EmailVerificationController;
use App\Http\Controllers\User\LoginController;
use App\Http\Controllers\User\LogoutController;
use App\Http\Controllers\User\PasswordResetController;
use App\Http\Controllers\User\RegisterController;
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

Route::get('/', [HomeController::class, 'home'])->name('home');

Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterController::class, 'view'])->name('register');
    Route::post('/register', [RegisterController::class, 'store']);

    Route::get('/login', [LoginController::class, 'view'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate']);

    Route::prefix('/password')->group(function() {
        Route::get('/forgot', [PasswordResetController::class, 'request'])->name('password.request');
        Route::post('/forgot', [PasswordResetController::class, 'email'])->name('password.email');
        Route::get('/reset/{token}', [PasswordResetController::class, 'reset'])->name('password.reset');
        Route::post('/reset', [PasswordResetController::class, 'update'])->name('password.update');
    });
});

Route::middleware('auth')->group(function () {
    Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');

    Route::prefix('/email')->group(function () {
        Route::get('/verify', [EmailVerificationController::class, 'notice'])->name('verification.notice');
        Route::get('/verify/{id}/{hash}', [EmailVerificationController::class, 'verify'])
            ->middleware(['signed'])
            ->name('verification.verify');
        Route::post('/verification-notification', [EmailVerificationController::class, 'send'])
            ->middleware(['throttle:6,1'])
            ->name('verification.send');
    });
});

Route::prefix('/admin')->middleware(['auth', 'verified'])->group(function () {
    Route::middleware('role:editor')->group(function () {
        Route::view('/', 'admin/start')->name('admin');

        Route::get('/articles', [ArticleController::class, 'index'])->name('admin.articles');
        Route::get('/article', [ArticleController::class, 'edit']);
        Route::get('/article/{id}', [ArticleController::class, 'edit'])->where('id', '[0-9]+');
        Route::get('/article/{id}/delete', [ArticleController::class, 'deleteConfirmation'])->where('id', '[0-9]+');

        Route::post('/article', [ArticleController::class, 'save']);
        Route::put('/article/{id}', [ArticleController::class, 'save'])->where('id', '[0-9]+');
        Route::delete('/article/{id}/delete', [ArticleController::class, 'delete'])->where('id', '[0-9]+');
    });

    Route::middleware('role:admin')->group(function () {
        Route::get('/users', [UserController::class, 'index'])->name('admin.users');
        Route::get('/user', [UserController::class, 'edit']);
        Route::get('/user/{id}', [UserController::class, 'edit'])->where('id', '[0-9]+');
        Route::get('/user/{id}/activate', [UserController::class, 'activateConfirmation'])->where('id', '[0-9]+');
        Route::get('/user/{id}/delete', [UserController::class, 'deleteConfirmation'])->where('id', '[0-9]+');

        Route::post('/user', [UserController::class, 'create']);
        Route::put('/user/{id}', [UserController::class, 'update'])->where('id', '[0-9]+');
        Route::post('/user/{id}/activate', [UserController::class, 'activate'])->where('id', '[0-9]+');
        Route::delete('/user/{id}/delete', [UserController::class, 'delete'])->where('id', '[0-9]+');
    });
});
