<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CimsaProfileController;
use App\Http\Controllers\CommitteController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DivisionMemberController;
use App\Http\Controllers\OfficialController;
use App\Http\Controllers\OfficialDivisionController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\TrainingController;
use App\Http\Controllers\UserController;
use App\Models\CimsaProfile;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

// This route is used to handle the post detail page.
Route::get('/blog/detail/{slug}', function (Request $request, $slug) {

    $post = Post::where('slug', $slug)->first();

    // if post not found, redirect to blog page
    if (!$post) {
        return redirect('/blog');
    }

    return view('react-index', [
        'meta' => [
            'title' => $post->title . " - CIMSA ULM" ?? 'Blog Post - CIMSA ULM',
            'description' => $post->highlight ?? '',
            'image' => $post->cover ?? url('/logo.png'),
            'type' => 'article'
        ]
    ]);
})->where('slug', '.*');

// This route will catch all non-defined routes and return the react-index view.
// This is necessary because the frontend is a SPA and the backend should not
// return a 404 error when a route is not found. Instead, the react-index view
// should be returned and the frontend will handle the route from there.
Route::fallback(function () {
    return view('react-index', [
        'meta' => [
            'title' => 'CIMSA ULM',
            'description' => 'CIMSA (Center for Indonesian Medical Students’ Activities) is an independent, non-profit and non-governmental organization, that centers on the Sustainable Development Goals.',
            'image' => url('/logo.png'),
            'type' => 'organization'
        ]
    ]);
});

Route::prefix('/admin')->group(function () {
    Route::middleware('auth')->group(function () {
        Route::get('/', function () {
            return redirect()->route('admin.dashboard');
        });

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

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

// For Routing Command
Route::prefix('/command')->group(function () {
    Route::get('/generate-dummy', function () {
        Artisan::call('app:generate-dummy');
        return redirect()->back()->with('success', 'Berhasil menambahkan data dummy.');
    });

    Route::get('/reset', function () {
        Artisan::call('app:reset');
        return redirect()->back()->with('success', 'Berhasil menambahkan data dummy.');
    });

    Route::get('/migrate', function () {
        Artisan::call('migrate');
        return redirect()->back()->with('success', 'Berhasil melakukan migrasi.');
    });

    Route::get('/migrate-fresh', function () {
        Artisan::call('migrate:fresh');
        return redirect()->back()->with('success', 'Berhasil melakukan migrasi.');
    });

    Route::get('/seed', function () {
        Artisan::call('db:seed');
        return redirect()->back()->with('success', 'Berhasil melakukan seed database.');
    });
});
