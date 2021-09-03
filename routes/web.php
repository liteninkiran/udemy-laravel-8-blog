<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

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

Route::prefix('admin')->group(function () {
    Route::name('admin.')->group(function () {

        // Admin home page
        Route::get('/home', function () {
            return view('admin.home');
        })->name('home');

        // Category routes
        Route::get('/categories/trashed', [CategoryController::class, 'trashed'])->name('categories.trashed');
        Route::get('/categories/{id}/undelete', [CategoryController::class, 'undelete'])->name('categories.undelete');
        Route::get('/categories/{id}/remove', [CategoryController::class, 'remove'])->name('categories.remove');
        Route::resource('/categories', CategoryController::class);

        // Post routes
        Route::get('/posts/index', [PostController::class, 'index'])->name('posts.index');
        Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
        Route::post('/posts/store', [PostController::class, 'store'])->name('posts.store');
        Route::get('/posts/{id}/edit', [PostController::class, 'edit'])->name('posts.edit');
        Route::post('/posts/{id}/update', [PostController::class, 'update'])->name('posts.update');
        Route::get('/posts/{id}/destroy', [PostController::class, 'destroy'])->name('posts.destroy');
        Route::get('/posts/trashed', [PostController::class, 'trashed'])->name('posts.trashed');
        Route::get('/posts/{id}/undelete', [PostController::class, 'undelete'])->name('posts.undelete');
        Route::get('/posts/{id}/remove', [PostController::class, 'remove'])->name('posts.remove');

        // User routes
        Route::get('/users/index', [UserController::class, 'index'])->name('users.index');
        Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
        Route::post('/users/store', [UserController::class, 'store'])->name('users.store');
        Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
        Route::post('/users/{id}/update', [UserController::class, 'update'])->name('users.update');
        Route::get('/users/{id}/destroy', [UserController::class, 'destroy'])->name('users.destroy');
        Route::get('/users/trashed', [UserController::class, 'trashed'])->name('users.trashed');
        Route::get('/users/{id}/promote/{promote}', [UserController::class, 'promote'])->name('users.promote');
        Route::get('/users/{id}/remove', [UserController::class, 'remove'])->name('users.remove');
    });
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
