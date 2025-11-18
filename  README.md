# **README.md**

# Laravel 8 Multi-Role Application

This project is a production-grade Laravel 8 application with:

* Laravel UI Authentication (Login, Register)
* Two user roles: **Admin** and **User**
* Separate **Admin Dashboard** and **User Dashboard**
* Admin can access User dashboard (but not vice-versa)
* Full CRUD for **Categories** with **N-level nested tree**
* Repository, Service, Interface pattern (clean MVC architecture)
* Pagination for all admin listings
* Pest/PHPUnit tests included
* Laravel 8.x + Bootstrap 4 (via Laravel UI)

---

## Table of Contents

* [Requirements](#requirements)
* [Installation](#installation)
* [Environment Setup](#environment-setup)
* [Auth Setup](#auth-setup)
* [Project Structure](#project-structure)
* [User Roles](#user-roles)
* [Category Module](#category-module)
* [Dashboards](#dashboards)
* [Testing](#testing)
* [Common Commands](#common-commands)

---

## Requirements

Make sure you have the following installed:

* PHP >= 7.3
* Composer
* MySQL / MariaDB
* Node.js & NPM
* Git

---

## Installation

### 1. Clone the repository

```sh
git clone https://gitlab.com/codebuddy3/categorypro
cd project
```

### 2. Install composer dependencies

```sh
composer install
```

### 3. Install frontend dependencies

```sh
npm install
npm run dev
```

---

## Environment Setup

### 1. Create `.env`

```sh
cp .env.example .env
```

Update values:

```
APP_NAME="Laravel Multi Role"
APP_ENV=local
APP_URL=http://localhost

DB_DATABASE=your_db
DB_USERNAME=your_user
DB_PASSWORD=your_pass
```

### 2. Generate application key

```sh
php artisan key:generate
```

### 3. Run migrations

```sh
php artisan migrate
```

### 4. Run seeder

```sh
php artisan db:seed
```

**admin user login**

* email: admin@example.com
* password: password

**user login**

* email: user@user.com
* password: password

---

## Auth Setup

This project uses **Laravel UI** authentication scaffolding.

### Install Laravel UI (already installed)

```sh
composer require laravel/ui
php artisan ui bootstrap --auth
npm install && npm run dev
```

---

## User Roles

Two roles exist:

* **admin**
* **user**

Admins can:

* View all users
* Access user dashboard
* Manage categories (CRUD)
* View category tree

Users can:

* Only access their own dashboard
* Cannot open admin pages

### Assign Roles (Seeder Example)

```
role: admin / user
```

---

## Project Structure (Repository + Service Architecture)

```
app/
 ├── Http/
 │    ├── Controllers/
 │    │     ├── Admin/
 │    │     ├── Auth/
 │    │     └── DashboardController.php
 │    └── Middleware/
 ├── Repositories/
 │    ├── Interfaces/
 │    │    ├── CategoryRepositoryInterface.php
 │    │    ├── UserRepositoryInterface.php
 │    ├── CategoryRepository.php
 │    ├── UserRepository.php
 ├── Services/
 │    ├── CategoryService.php
 │    ├── UserService.php
 └── Providers/
 │    └── RepositoryServiceProvider.php
 ├── Models/
 │    ├── Category.php
 │    ├── User.php
```

### Why this structure?

* Controllers stay **thin**
* Business logic is placed in **Services**
* Database queries handled by **Repositories**
* Loose coupling, better testability

---

## Category Module

### Features

* N-level nested categories (recursive)
* Tree view for admin dashboard
* CRUD operations
* Pagination for category list
* Parent/child relationships

### Database Table

```
categories
---------
id
name
parent_id (nullable)
description
timestamps
```

### Tree Example

```
Category 1
 ├── Category 1.1
 ├── Category 1.2
Category 2
 ├── Category 2.1
 └── Category 2.2
```

---

## Dashboards

### User Dashboard

```
/dashboard
```

### Admin Dashboard

```
/admin/dashboard
```

Admin can enter user dashboard via:

```
/admin/users/{id}/dashboard
```

User **cannot** enter admin dashboard.

---

## Testing

Pest is available.

### Run all tests:

```sh
php artisan test
```

### Pest (recommended)

```sh
./vendor/bin/pest
```

### Included Tests

* Guest can access `/login`
* Auth user redirected from `/login` → `/dashboard`
* Successful login redirects to dashboard
* Dashboard requires authentication
* Role-based dashboard tests

---

## Common Commands

### Start local development server

```sh
php artisan serve
```

### Rebuild UI assets

```sh
npm run dev
npm run build
```

### Migrate database

```sh
php artisan migrate
```

### Seed data

```sh
php artisan db:seed
```

---
