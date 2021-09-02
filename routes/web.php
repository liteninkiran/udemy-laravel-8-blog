<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

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
        Route::get('/home', function () {
            return view('admin.home');
        })->name('home');
        Route::get('/categories/trashed', [CategoryController::class, 'trashed'])->name('categories.trashed');
        Route::get('/categories/{id}/undelete', [CategoryController::class, 'undelete'])->name('categories.undelete');
        Route::get('/categories/{id}/remove', [CategoryController::class, 'remove'])->name('categories.remove');
        Route::resource('/categories', CategoryController::class);
    });
});
