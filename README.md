# Walton Family Dentistry Website

Production-ready Laravel 12 + Livewire 3 marketing site for Walton Family Dentistry. Built with Tailwind CSS, accessible components, and seed data for services, doctors, reviews, and insurance providers.

## Requirements

- PHP 8.2+
- Composer
- Node 20+
- SQLite (default) or your preferred database

## Getting Started

1. Install PHP dependencies:
   ```bash
   composer install
   ```
2. Copy the environment file and generate an app key:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
3. Configure your database in `.env` (SQLite works out-of-the-box).
4. Run database migrations with seed data:
   ```bash
   php artisan migrate --seed
   ```
5. Install and run the frontend build:
   ```bash
   npm install
   npm run dev # or npm run build for production
   ```
6. Serve the application:
   ```bash
   php artisan serve
   ```

### Helpful Artisan Commands

- Cache configuration & routes before deploying:
  ```bash
  php artisan config:cache
  php artisan route:cache
  ```
- Clear caches during local development:
  ```bash
  php artisan optimize:clear
  ```

## Testing

The suite uses Pest. From a fresh terminal session run:
```bash
php artisan test
```
This covers:
- Contact form validation, spam protection, and email dispatch
- Rendering for all public pages
- Reviews pagination with JSON-LD present
- Health check and sitemap endpoints

## Frontend & Design Tokens

Tailwind CSS powers the UI. Key files:
- `tailwind.config.js` for the brand monochrome palette
- `resources/css/app.css` for base styles & typography tweaks
- `resources/js/app.js` for lightweight behavioral hooks

To adjust brand styling (currently black/white with optional accent):
1. Update `config/practice.php` or the matching env keys
2. Refresh the brand scale or typography in `tailwind.config.js`
3. Re-run `npm run dev` (or `npm run build` for production)

## Content Management

All marketing content is seeded for easy editing:
- Services, doctors, FAQs, insurance providers, and reviews live in `database/seeders`
- Update seed data then run `php artisan db:seed`
- Markdown fields render through Blade typography helpers

For quick edits you can also update Blade partials in `resources/views/pages` and reusable components in `resources/views/components`.

## Environment Reference

These keys map to `config/practice.php` and drive the site content:
```
PRACTICE_NAME
PHONE_NUMBER
SCHEDULING_URL
CONTACT_EMAIL
STREET_ADDRESS
CITY
STATE
ZIP
GOOGLE_MAPS_EMBED_URL
FACEBOOK_URL
INSTAGRAM_URL
TIKTOK_URL
ACCENT_COLOR
```

## Deployment Notes

- **Forge / VPS:** run `npm run build`, `php artisan migrate --force`, and cache config/routes.
- **Vapor:** ensure your build step runs `npm run build` and `php artisan event:cache` before deploy.
- **Vercel (PHP Runtime):** use `npm run build` during the build phase and serve via `public/index.php`.
- Queue workers are optional; the contact form sends mail synchronously for simplicity.

## Utilities

- `GET /healthz` returns `{ "status": "ok" }` for uptime checks
- `GET /sitemap.xml` and `GET /robots.txt` support SEO crawlers

Enjoy building on top of this accessible, high-contrast base for Walton Family Dentistry.
