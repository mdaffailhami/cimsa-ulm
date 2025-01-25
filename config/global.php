<?php

return [
    'url' => env('APP_MODE') === 'dev' ? env('DEV_URL') : env("PROD_URL"),
    'frontend_url' => env('FRONTEND_URL', 'http://127.0.0.1:8000/'),
    'backend_url' => env('FRONTEND_URL', 'http://127.0.0.1:8000/')
];
