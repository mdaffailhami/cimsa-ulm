<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// This route will catch all non-defined routes and return the react-index view.
// This is necessary because the frontend is a SPA and the backend should not
// return a 404 error when a route is not found. Instead, the react-index view
// should be returned and the frontend will handle the route from there.
Route::fallback(function () {
    return view('react-index');
});

Route::prefix('/admin')->group(function () {
    Route::middleware('auth')->group(function () {
        Route::get('/', function () {
            return redirect()->route('admin.dashboard');
        });

        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');

        Route::post('/logout', [AuthController::class, 'logout'])->name('admin.logout');
    });

    Route::middleware('guest')->group(function () {
        Route::get('/login', [AuthController::class, 'index'])->name('admin.login-page');
        Route::post('/login', [AuthController::class, 'login'])->name('admin.login');
    });
})->name('admin');
