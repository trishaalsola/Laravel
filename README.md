# Laravel Authentication Lab Assignment

This Laravel application demonstrates user authentication using Laravel Breeze with a custom dashboard.

## Setup Instructions

### 1. Install Dependencies

```bash
composer install
```

### 2. Configure Environment

The `.env` file is already configured to use MySQL database named `laravel`. Make sure your XAMPP MySQL server is running.

Database Configuration:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```

### 3. Run Migrations and Seeders

```bash
php artisan migrate:fresh --seed
```

This will create the database tables and populate them with 100 user records.

### 4. Install Node Dependencies and Build Assets

```bash
npm install
npm run build
```

If you encounter PowerShell execution policy issues with npm, run this command first:
```bash
Set-ExecutionPolicy -Scope CurrentUser -ExecutionPolicy RemoteSigned
```

Alternatively, for development, you can run:
```bash
npm run dev
```

### 5. Start the Development Server

```bash
php artisan serve
```

The application will be available at: `http://localhost:8000`

**Note:** When you visit `http://localhost:8000`, you will be automatically redirected to the login page if you're not logged in, or to the dashboard if you're already authenticated.

### 6. Run Vite Dev Server (for hot reloading)

In a separate terminal:

```bash
npm run dev
```

## Sample Login Credentials

The database seeder creates 100 users, including 3 test users with known credentials:

### Test User 1
- **Username:** testuser
- **Email:** test@example.com
- **Password:** password

### Test User 2 (Admin)
- **Username:** admin
- **Email:** admin@example.com
- **Password:** admin123

### Test User 3
- **Username:** johndoe
- **Email:** john@example.com
- **Password:** john123

## Features Implemented

### 1. Database Migration (Users Table)
- ✅ id
- ✅ username (string, unique)
- ✅ name (string)
- ✅ email (string, unique)
- ✅ password (string)
- ✅ is_active (boolean, default: true)
- ✅ last_login (timestamp, nullable)
- ✅ created_at and updated_at (timestamps)

### 2. Factories and Seeders
- ✅ User Factory with realistic dummy data
- ✅ DatabaseSeeder that creates 100 users
- ✅ 3 test users with known credentials for login testing

### 3. Authentication Scaffolding
- ✅ Laravel Breeze installed
- ✅ Authentication views, controllers, and routes generated
- ✅ Frontend assets configured with Vite

### 4. Routing and Dashboard
- ✅ `/dashboard` route created
- ✅ Dashboard protected with authentication middleware
- ✅ Users redirected to `/dashboard` after successful login

### 5. Dashboard View
- ✅ Uses Bootstrap 5 framework
- ✅ Displays logged-in user's information:
  - Username
  - Full Name
  - Email
  - Account Status (Active/Inactive badge)
  - Last Login date
  - Member Since date
- ✅ Welcome message
- ✅ Responsive and clean layout
- ✅ Quick actions (Edit Profile, Logout)

## Application Routes

- `/` - Welcome page
- `/login` - Login page
- `/register` - Registration page
- `/dashboard` - Protected dashboard (requires authentication)
- `/profile` - User profile management

## Testing the Application

1. Make sure XAMPP MySQL is running
2. Start the Laravel development server: `php artisan serve`
3. Visit `http://localhost:8000` (you will be automatically redirected to the login page)
4. Use any of the sample credentials above
5. After successful login, you will be automatically redirected to the dashboard
6. The dashboard displays your user information with Bootstrap styling
7. Your last login time will be updated each time you log in

## Database Schema

### Users Table
| Column | Type | Constraints |
|--------|------|-------------|
| id | BIGINT | PRIMARY KEY, AUTO_INCREMENT |
| username | VARCHAR(255) | UNIQUE, NOT NULL |
| name | VARCHAR(255) | NOT NULL |
| email | VARCHAR(255) | UNIQUE, NOT NULL |
| email_verified_at | TIMESTAMP | NULLABLE |
| password | VARCHAR(255) | NOT NULL |
| is_active | BOOLEAN | DEFAULT TRUE |
| last_login | TIMESTAMP | NULLABLE |
| remember_token | VARCHAR(100) | NULLABLE |
| created_at | TIMESTAMP | NOT NULL |
| updated_at | TIMESTAMP | NOT NULL |

## Technologies Used

- Laravel 9.x
- Laravel Breeze 1.x
- Bootstrap 5.3
- MySQL
- Vite
- PHP 8.1+

## Project Structure

- `app/Models/User.php` - User model with fillable fields and casts
- `database/migrations/2014_10_12_000000_create_users_table.php` - Users table migration
- `database/factories/UserFactory.php` - User factory for generating test data
- `database/seeders/DatabaseSeeder.php` - Seeder that creates 100 users
- `resources/views/dashboard.blade.php` - Dashboard view with Bootstrap
- `resources/views/layouts/app.blade.php` - Main layout with Bootstrap CSS/JS
- `routes/web.php` - Web routes including protected dashboard route

## Notes

- All 100 seeded users have the same hashed password structure
- The 3 test users have bcrypt-hashed passwords for their respective passwords
- The application uses Bootstrap via CDN for styling
- Email verification is optional (not required for this lab)
- The `is_active` field is generated with 90% probability of being true
- The `last_login` field is populated with 70% probability for seeded users
