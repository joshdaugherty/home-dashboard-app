# home-dashboard-app

The Laravel application deployed to Laravel Cloud. It is the Livewire starter kit (registration, email verification, 2FA, passkeys and password confirmation removed) plus the [`joshdaugherty/home-dashboard`](https://github.com/joshdaugherty/home-dashboard) package, which provides the dashboard UI at `/`.

## Deploy on Laravel Cloud

1. Create an application from this repo (branch `main`) with a database attached.
2. Set environment variables: `APP_KEY`, `APP_ENV=production`, `APP_DEBUG=false`, `SESSION_DRIVER=database`, `SESSION_LIFETIME=525600` (a year, in minutes), `DASHBOARD_USER_EMAIL`, `DASHBOARD_USER_PASSWORD`, optionally `DASHBOARD_USER_NAME`.
3. Deploy commands: `php artisan migrate --force` then `php artisan home-dashboard:user`.
4. Build commands: `npm ci && npm run build`.

If `joshdaugherty/home-dashboard` is a private repo, Composer needs a GitHub token to fetch it (set `COMPOSER_AUTH` in Cloud), or make the package repo public.

## Updating the dashboard

`composer update joshdaugherty/home-dashboard`, commit `composer.lock`, push.
