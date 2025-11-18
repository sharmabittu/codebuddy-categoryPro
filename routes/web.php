<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [HomeController::class, 'index'])->name('home');

Auth::routes();

// Authenticated dashboards
Route::middleware('auth')->group(function () {
    // User dashboard - default /dashboard
    Route::get('/dashboard', [DashboardController::class, 'user'])->name('dashboard');

    // Admin area
    Route::prefix('admin')->name('admin.')->middleware(['auth', 'is_admin'])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'admin'])->name('dashboard');

        // user management
        Route::get('users', [UserController::class, 'index'])->name('users.index');
        Route::get('users/{id}', [UserController::class, 'show'])->name('users.show');
        Route::get('users/{id}/dashboard', [UserController::class, 'dashboard'])->name('users.dashboard');

        // categories (resource)
        Route::resource('categories', CategoryController::class);
        // optional: paginated listing
        Route::get('categories-paginated', [CategoryController::class, 'listPaginated'])->name('categories.paginated');
    });
});
