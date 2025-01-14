<?php

use Illuminate\Support\Facades\Route;

// If route is_a not found (404), then return react-index.blade.php
Route::fallback(function () {
    return view('react-index');
});

