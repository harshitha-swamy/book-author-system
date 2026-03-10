# Book & Author Management System

A simple Laravel 10 REST API to manage Authors and their Books.

## Requirements

- PHP 8.1+
- Composer
- MySQL or SQLite

## Setup

**1. Clone the repository**
```bash
git clone https://github.com/harshitha-swamy/book-author-system.git
cd book-author-system
```

**2. Install dependencies**
```bash
composer install
```

**3. Configure environment**
```bash
cp .env.example .env
php artisan key:generate
```

Update `.env` with your database credentials:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=book_author_db
DB_USERNAME=root
DB_PASSWORD=
```

**4. Run migrations and seed**
```bash
php artisan migrate --seed
```

**5. Start the server**
```bash
php artisan serve
```

## API Endpoints

### Authors
| Method | Endpoint | Description |
|--------|----------|-------------|
| GET | `/api/authors` | List all authors |
| POST | `/api/authors` | Create a new author |
| GET | `/api/authors/{id}` | Get author with their books |
| PUT | `/api/authors/{id}` | Update an author |
| DELETE | `/api/authors/{id}` | Delete an author |

### Books
| Method | Endpoint | Description |
|--------|----------|-------------|
| GET | `/api/books` | List all books |
| POST | `/api/books` | Create a new book |
| GET | `/api/books/{id}` | Get book with author info |
| PUT | `/api/books/{id}` | Update a book |
| DELETE | `/api/books/{id}` | Delete a book |