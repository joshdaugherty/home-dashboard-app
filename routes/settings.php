<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::livewire('settings/profile', 'pages::settings.profile')->name('profile.edit');

    Route::livewire('settings/people', 'pages::settings.people')->name('dashboard.people');
    Route::livewire('settings/calendars', 'pages::settings.calendars')->name('dashboard.settings');
    Route::livewire('settings/location', 'pages::settings.location')->name('dashboard.location');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::livewire('settings/appearance', 'pages::settings.appearance')->name('appearance.edit');

    Route::livewire('settings/security', 'pages::settings.security')
        ->name('security.edit');
});
