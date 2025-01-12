<?php

use App\Http\Controllers\CimsaProfileController;
use App\Http\Controllers\CommitteController;
use App\Http\Controllers\OfficialController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\TrainingController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::get('/image/{path}', function ($path) {
    $filePath = public_path("storage/{$path}");
    if (file_exists($filePath)) {
        return response()->file($filePath);
    } else {
        abort(404); // Return a 404 response if the file doesn't exist
    }
})->where('path', '.*');


Route::get('/cimsa-profile', [CimsaProfileController::class, 'api']);
Route::get('/page/{uri}', [PageController::class, 'api']);
Route::get('/official', [OfficialController::class, 'api']);
Route::get('/committe', [CommitteController::class, 'api']);
Route::get('/committe/{name}', [CommitteController::class, 'apiDetail']);
Route::get('/program', [ProgramController::class, 'api']);
Route::get('/training', [TrainingController::class, 'api']);
Route::get('/post', [PostController::class, 'api']);
Route::get('/post/{slug}', [PostController::class, 'apiDetail']);
