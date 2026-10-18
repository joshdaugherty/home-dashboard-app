<?php

use Illuminate\Support\Facades\Route;

// The dashboard itself ("/", named "dashboard") is registered by joshdaugherty/home-dashboard.
// The starter kit's layouts link to the `home` route, so keep it as an alias.
Route::redirect('/home', '/')->name('home');

require __DIR__.'/settings.php';
