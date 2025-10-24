<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $A = 5;
    return view('welcome');
});
