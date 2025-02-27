<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

abstract class Controller
{
    protected $auth_user;

    public function __construct()
    {
        $this->auth_user = Auth::user();
    }
}
