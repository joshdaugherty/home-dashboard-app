<?php

// Overrides for joshdaugherty/home-dashboard (see the package's config for every option).
return [
    'route' => [
        // The starter kit's navigation and login redirect use the `dashboard` route name.
        'name' => 'dashboard',
        'middleware' => ['web', 'auth'],
    ],
    // The dashboard's people, calendar and location settings live inside the app's own /settings area.
    'settings_route' => 'dashboard.settings',
    'title' => env('DASHBOARD_TITLE', 'Home'),
];
