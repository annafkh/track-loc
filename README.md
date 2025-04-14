<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
  </a>
</p>

<p align="center">
  <a href="https://github.com/laravel/framework/actions">
    <img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status">
  </a>
  <a href="https://packagist.org/packages/laravel/framework">
    <img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads">
  </a>
  <a href="https://packagist.org/packages/laravel/framework">
    <img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version">
  </a>
  <a href="https://packagist.org/packages/laravel/framework">
    <img src="https://img.shields.io/packagist/l/laravel/framework" alt="License">
  </a>
</p>

## About This Project

This is a Laravel-based web application built using the Laravel PHP Framework. Laravel provides a clean and elegant syntax while making common development tasks—such as authentication, routing, sessions, and caching—simple and fast.

## Features

- Powerful routing system
- Eloquent ORM for database interactions
- Blade templating engine
- Authentication and authorization
- RESTful API support
- Background job queue
- Real-time event broadcasting
- Artisan CLI for command-line automation

## Installation

Follow the steps below to set up the project on your local machine:

### Prerequisites

- PHP >= 8.1
- Composer
- MySQL or other supported database
- Node.js and npm (for frontend assets)

### Steps

```bash
# 1. Clone the repository
git clone https://github.com/annafkh/track-loc.git
cd your-laravel-project

# 2. Install PHP dependencies
composer install

# 3. Copy .env file and set up your environment variables
cp .env.example .env

# 4. Generate application key
php artisan key:generate

# 5. Configure your database settings in the .env file

# 6. Run database migrations
php artisan migrate

# 7. (Optional) Seed the database
php artisan db:seed

# 8. Install frontend dependencies
npm install && npm run dev

# 9. Start the local development server
php artisan serve

```
## Utility

- https://track-location-w-link-main-ru4dcy.laravel.cloud/generate-link => for generate link
- https://track-location-w-link-main-ru4dcy.laravel.cloud/dashboard => dashboard target

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
