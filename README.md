# home-dashboard-app

The Laravel application deployed to Laravel Cloud. It is the Livewire starter kit (registration, email verification, 2FA, passkeys and password confirmation removed) plus the [`joshdaugherty/home-dashboard`](https://github.com/joshdaugherty/home-dashboard) package, which provides the dashboard UI at `/`. The package's README documents the dashboard itself: tabs, calendars, people, backgrounds, weather and the idle screen.

This app owns authentication, the settings area, and the Cloud deployment configuration.

## Deploy on Laravel Cloud

1. Create an application from this repo (branch `main`) with a database attached.
2. Set environment variables: `APP_KEY`, `APP_ENV=production`, `APP_DEBUG=false`, `SESSION_DRIVER=database` (a custom variable that overrides Cloud's injected `cookie`), `SESSION_LIFETIME=525600` (a year, in minutes), `DASHBOARD_USER_EMAIL`, `DASHBOARD_USER_PASSWORD`, optionally `DASHBOARD_USER_NAME`.
3. Optional: `DASHBOARD_NASA_KEY` (a free key from <https://api.nasa.gov>) adds NASA's Astronomy Picture of the Day to the Today background on alternate hours. Treat it like a password and set it as a Cloud custom variable, never in the repo.
4. Shopping and Meals (Notion): set `NOTION_TOKEN` (an internal integration secret from <https://www.notion.so/profile/integrations>, shared with the Home Dashboard page) as a Cloud custom variable. The database ids default to this household's workspace in `config/home-dashboard.php`; override them with `NOTION_AISLES`, `NOTION_ITEMS`, `NOTION_MEALS`, `NOTION_PLAN`. The package README describes the databases.
5. Build command (one line): `composer install --no-dev --no-interaction --prefer-dist --optimize-autoloader && npm ci --audit false && npm run build`
6. Deploy command (one line): `php artisan migrate --force && php artisan home-dashboard:user`

Calendars, people, location and units are **not** environment variables any more: enter them in the app (below). The `DASHBOARD_*` fallbacks in `.env.example` still work if nothing has been saved.

## Settings

Sign in and open **Settings** (the gear at the right end of the dashboard's tab bar, or `/settings`). The dashboard's settings live alongside the account pages:

- **People** (`/settings/people`): name, Gravatar email and color for each person.
- **Calendars** (`/settings/calendars`): each iCal feed's name, category, person, color and address.
- **Location** (`/settings/location`): place search, coordinates, time zone and units.

Saved settings are stored encrypted in the database, so the Cloud database is separate from your local one: enter them once on the production site. Feed addresses are credentials; they are write-only and never shown again after saving. Saving settings reloads the frame within a couple of minutes.

The frame's Settings buttons use `settings_route` in `config/home-dashboard.php`, which points at the Calendars page.

## Updating the dashboard

`composer update joshdaugherty/home-dashboard`, run `composer ci:check`, commit `composer.lock`, push. A minor bump such as 0.3 to 0.4 needs the constraint in `composer.json` raised first, since caret ranges on 0.x are one minor wide. Cloud rebuilds on push, and the open frame reloads itself after the deploy.

Never commit a Composer `local` path repository or a lock file that points at one.

## Checks

```bash
composer ci:check   # Pint, PHPStan and the test suite
```
