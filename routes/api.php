<?php

use App\Http\Controllers\CimsaProfileController;
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
