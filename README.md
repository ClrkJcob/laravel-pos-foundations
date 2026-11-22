
# Laravel POS Foundations

**IT0049 - Web System Technologies**  
**Technical Formative Assessment 5**

A simple Point of Sale (POS) foundation application built with Laravel 13.

## Features

- Landing page (/)
- About page (/about)
- Customer Accounts (/customers)
- User Accounts (/users)
- Shared navigation using Blade layouts
- Static PHP arrays as temporary data sources
- Blade @foreach loops for displaying account records
- Database migrations and seeders

## Requirements

- PHP 8.3 or higher
- Composer
- Laravel 13
- Git

## Installation

1. Clone the repository:

   git clone https://github.com/ClrkJcob/laravel-pos-foundations.git

2. Enter the project directory:

   cd laravel-pos-foundations

3. Install dependencies:

   composer install

4. Create the environment file:

   Copy .env.example to .env

5. Generate the application key:

   php artisan key:generate

6. Run database migrations and seeders:

   php artisan migrate --seed

7. Start the development server:

   php artisan serve

8. Open http://127.0.0.1:8000 in your browser.

## Pages

| Page | URL |
|---|---|
| Landing | / |
| About | /about |
| Customer Accounts | /customers |
| User Accounts | /users |

## Author

GitHub: [ClrkJcob](https://github.com/ClrkJcob)
