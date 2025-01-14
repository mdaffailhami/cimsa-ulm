<?php

use Illuminate\Support\Facades\Route;

// This route will catch all non-defined routes and return the react-index view.
// This is necessary because the frontend is a SPA and the backend should not
// return a 404 error when a route is not found. Instead, the react-index view
// should be returned and the frontend will handle the route from there.
Route::fallback(function () {
    return view('react-index');
});

