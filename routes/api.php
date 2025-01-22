<?php

use App\Http\Controllers\CimsaProfileController;
use App\Http\Controllers\CommitteController;
use App\Http\Controllers\ImageController;
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

Route::get('/image/{path}', [ImageController::class, 'show'])->where('path', '.*')->name('api.image.show');
Route::post('/image/upload', [ImageController::class, 'upload'])->name('api.image.upload');
Route::post('/image/revert', [ImageController::class, 'revert'])->name('api.image.revert');
Route::post('/image/load', [ImageController::class, 'load'])->name('api.image.load');


Route::get('/cimsa-profile', [CimsaProfileController::class, 'api']);
Route::get('/page/{uri}', [PageController::class, 'api']);
Route::get('/official', [OfficialController::class, 'api']);
Route::get('/committe', [CommitteController::class, 'api']);
Route::get('/committe/{name}', [CommitteController::class, 'apiDetail']);
Route::get('/program', [ProgramController::class, 'api']);
Route::get('/training', [TrainingController::class, 'api']);
Route::get('/post', [PostController::class, 'api']);
Route::get('/post/{slug}', [PostController::class, 'apiDetail']);
