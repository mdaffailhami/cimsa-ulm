<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CimsaProfileController;
use App\Http\Controllers\CommitteController;
use App\Http\Controllers\DivisionMemberController;
use App\Http\Controllers\OfficialController;
use App\Http\Controllers\OfficialDivisionController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\UserController;
use App\Models\CimsaProfile;
use App\Models\OfficialDivision;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// This route will catch all non-defined routes and return the react-index view.
// This is necessary because the frontend is a SPA and the backend should not
// return a 404 error when a route is not found. Instead, the react-index view
// should be returned and the frontend will handle the route from there.
Route::fallback(function () {
    return view('react-index');
});

Route::get('/test', function () {
    return Inertia::render('Welcome');
});

Route::prefix('/admin')->group(function () {
    Route::middleware('auth')->group(function () {
        Route::get('/', function () {
            return redirect()->route('admin.dashboard');
        });

        Route::get('/dashboard', function () {
            return view('admin.pages.dashboard');
        })->name('admin.dashboard');

        Route::resource('cimsa-profile', CimsaProfileController::class);
        Route::put('cimsa-profile/update', [CimsaProfile::class, 'update'])->name('cimsa-profile.update-new');

        Route::resource('page', PageController::class);
        Route::resource('official', OfficialController::class);

        Route::prefix('official')->group(function () {
            Route::get('{year}/division', [OfficialDivisionController::class, 'index'])->name('official.division.index');
            Route::post('division', [OfficialDivisionController::class, 'store'])->name('official.division.store');
            Route::put('/division/{division}', [OfficialDivisionController::class, 'update'])->name('official.division.update');
            Route::delete('/division/{division}', [OfficialDivisionController::class, 'destroy'])->name('official.division.destroy');

            Route::get('{year}/division/{id}/member', [DivisionMemberController::class, 'index'])->name('official.division.member.index');
            Route::post('division/member', [DivisionMemberController::class, 'store'])->name('official.division.member.store');
            Route::put('/division/member/{member}', [DivisionMemberController::class, 'update'])->name('official.division.member.update');
            Route::delete('/division/member/{member}', [DivisionMemberController::class, 'destroy'])->name('official.division.member.destroy');
        });

        Route::resource('committe', CommitteController::class);
        Route::resource('training', TrainingController::class);

        Route::resource('article', PostController::class);
        Route::resource('category', CategoryController::class);

        Route::resource('user', UserController::class);
        Route::resource('role', RoleController::class);

        Route::post('/logout', [AuthController::class, 'logout'])->name('admin.logout');
    });

    Route::middleware('guest')->group(function () {
        Route::get('/login', [AuthController::class, 'index'])->name('admin.login-page');
        Route::post('/login', [AuthController::class, 'login'])->name('admin.login');
    });
})->name('admin');
