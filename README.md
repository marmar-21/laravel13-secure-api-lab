# Laravel 13 Secure API Lab

## Project Description

This project demonstrates API authentication and role-based access control using Laravel 13 and Laravel Sanctum.

It provides secure API endpoints for Admin and Student users. Access to protected routes is controlled through authentication and middleware.

## Features

- User registration and login
- API authentication using Laravel Sanctum
- Token-based authentication
- Role-based access control
- Admin-only dashboard
- Student-only dashboard
- Protected API routes
- JSON responses for API requests
- HTTP status codes for unauthorized and forbidden access

## User Roles

| Role | Access |
|---|---|
| Admin | Admin Dashboard and shared Students route |
| Student | Student Dashboard and shared Students route |

## API Endpoints

| Method | Endpoint | Description | Access |
|---|---|---|---|
| POST | `/api/register` | Register a user | Public |
| POST | `/api/login` | Login and generate token | Public |
| GET | `/api/sample` | Sample API response | Public |
| GET | `/api/hello` | Welcome API response | Public |
| GET | `/api/user` | Get authenticated user | Authenticated |
| GET | `/api/profile` | View protected profile | Authenticated |
| POST | `/api/logout` | Logout and revoke current token | Authenticated |
| GET | `/api/students` | Access shared Students route | Admin and Student |
| GET | `/api/admin/dashboard` | Access Admin Dashboard | Admin only |
| GET | `/api/student/dashboard` | Access Student Dashboard | Student only |

## Middleware

- `auth:sanctum` – Checks whether the user is authenticated.
- `CheckRole` – Checks whether the authenticated user has an allowed role.
- `AdminMiddleware` – Restricts access to Admin users only.

## HTTP Status Codes

| Status Code | Meaning |
|---|---|
| 200 | Request successful |
| 401 | Unauthenticated – no valid authentication token |
| 403 | Forbidden – authenticated user does not have permission |
| 422 | Validation error |

## Technologies Used

- PHP 8.4 or higher, according to the project's Composer requirements
- Laravel 13
- Laravel Sanctum
- MySQL
- Postman
- Composer

## Installation and Setup

1. Clone the repository:

   ```bash
   git clone https://github.com/marmar-21/laravel13-secure-api-lab.git
   ```

2. Navigate to the project folder:

   ```bash
   cd laravel13-secure-api-lab
   ```

3. Install dependencies:

   ```bash
   composer install
   ```

4. Create the environment file:

   ```powershell
   Copy-Item .env.example .env
   ```

5. Generate the application key:

   ```bash
   php artisan key:generate
   ```

6. Configure your database credentials in `.env`.

7. Run database migrations:

   ```bash
   php artisan migrate
   ```

8. Start the development server:

   ```bash
   php artisan serve
   ```

API base URL:

`http://127.0.0.1:8000`

## Postman Testing

The API tests cover:

1. Admin login
2. Admin access to the Admin Dashboard
3. Admin denied access to the Student Dashboard
4. Student login
5. Student access to the Student Dashboard
6. Student denied access to the Admin Dashboard
7. Admin and Student access to the shared Students route
8. Unauthorized access without a token

For protected endpoints, use the Bearer Token returned by the login endpoint.

## Screenshots

The `screenshots` folder contains the Postman testing evidence:

1. `01-admin-login.png`
2. `02-admin-allowed.png`
3. `03-admin-denied.png`
4. `04-student-login.png`
5. `05-student-allowed.png`
6. `06-student-denied.png`
7. `07-shared-route.png`
8. `08-no-token.png`

## Security Notes

- Never upload your `.env` file.
- Never publish passwords or authentication tokens.
- Use valid Bearer Tokens for protected endpoints.
- Access to protected routes is controlled through middleware.

## Author

Laravel 13 Secure API Lab
