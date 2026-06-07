# TAGO Tafels & Interieur

Premium Laravel 13 website voor Tago Tafels & Interieur: een warme portfolio- en offertewebsite voor maatwerktafels in hout en staal.

## Stack

- Laravel 13 / PHP 8.5
- Blade + Tailwind CSS 4.3
- Vite 8 + TypeScript
- Three.js voor de subtiele 3D tafelimpressie
- GSAP ScrollTrigger voor rustige scroll-reveals en parallax

## Setup

```bash
composer install
npm install
cp .env.example .env
php artisan key:generate
```

Vul voor echte contactaanvragen `TAGO_CONTACT_EMAIL` in `.env` in. Zonder die waarde wordt het formulier niet naar een verzonnen mailbox verzonden.

## Development

```bash
php artisan serve
npm run dev
```

## Checks

```bash
composer test
npm run build
```
