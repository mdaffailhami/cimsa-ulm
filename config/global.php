<?php

return [
    'url' => env('APP_MODE') === 'dev' ? env('DEV_URL') : env("PROD_URL")
];
