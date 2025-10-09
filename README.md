# Note App

A modern note-taking application built with Laravel 12 and Vue.js, using PostgreSQL as the database.

## Tech Stack

-   **Backend:** Laravel 12
-   **Frontend:** Vue.js
-   **Database:** PostgreSQL
-   **CSS Framework:** Tailwind CSS
-   **Package Manager:** Composer (PHP) and NPM (JavaScript)
-   **Build Tool:** Vite

## Features

-   User authentication
-   Create, read, update, and delete notes
-   Responsive design
-   Real-time updates

## Prerequisites

-   PHP 8.2 or higher
-   Composer
-   Node.js & NPM
-   PostgreSQL
-   Laravel CLI

## Installation

1. Clone the repository:

```bash
git clone https://github.com/akbarwjyy/note-app.git
cd note-app
```

2. Install PHP dependencies:

```bash
composer install
```

3. Install JavaScript dependencies:

```bash
npm install
```

4. Create a copy of the .env file:

```bash
cp .env.example .env
```

5. Configure your PostgreSQL database connection in `.env`:

```env
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=note_app
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

6. Generate application key:

```bash
php artisan key:generate
```

7. Run database migrations:

```bash
php artisan migrate
```

8. Build frontend assets:

```bash
npm run build
```

## Development

1. Start the Laravel development server:

```bash
php artisan serve
```

2. Start the Vite development server for frontend:

```bash
npm run dev
```

The application will be accessible at `http://localhost:8000`

## Testing

Run the test suite:

```bash
php artisan test
```

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
