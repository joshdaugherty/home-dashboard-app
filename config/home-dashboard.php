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
    // The shopping list and meal plan live in this household's Notion workspace (Home Dashboard page). The ids are data source
    // ids, not secrets; the integration token is NOTION_TOKEN and belongs in the environment only.
    'notion' => [
        'token' => env('NOTION_TOKEN'),
        'aisles' => env('NOTION_AISLES', '83d3fe88-2519-46c0-9efe-d8d52fefa1f8'),
        'items' => env('NOTION_ITEMS', 'c57d6f36-de4f-428f-87ae-2e70de998d78'),
        'meals' => env('NOTION_MEALS', 'c818f2e8-ed2e-4771-bf1d-fc5b7dc532f2'),
        'plan' => env('NOTION_PLAN', '61ef4fe5-4058-46a5-b1ee-d57c875f7777'),
    ],
    // Items with no aisle are filed under the aisle this Kroger store keeps them in (Cantrell Marketplace, Little Rock).
    // The client id and secret come from the environment only.
    'kroger' => [
        'client_id' => env('KROGER_CLIENT_ID'),
        'client_secret' => env('KROGER_CLIENT_SECRET'),
        'location_id' => env('KROGER_LOCATION_ID', '02500622'),
    ],
];
