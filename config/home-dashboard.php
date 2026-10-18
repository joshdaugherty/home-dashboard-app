<?php

// Overrides for joshdaugherty/home-dashboard (see the package's config for every option).
return [
    'route' => [
        // The starter kit's navigation and login redirect use the `dashboard` route name.
        'name' => 'dashboard',
        'middleware' => ['web', 'auth'],
    ],
    'title' => env('DASHBOARD_TITLE', 'Home'),
];
