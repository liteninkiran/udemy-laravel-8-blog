<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;

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

Route::get('/', [UsersController::Class, 'home']);

Route::get('/create_user_form', [UsersController::Class, 'userForm'])->name('create.user');
Route::get('/single_user/{id}', [UsersController::Class, 'user'])->name('user');
Route::get('/edit_user/{id}', [UsersController::Class, 'edit'])->name('edit');
Route::post('/update_user/{id}', [UsersController::Class, 'updateUser'])->name('update');
Route::get('/delete_user/{id}', [UsersController::Class, 'deleteUser'])->name('delete');
Route::post('new/user', [UsersController::Class, 'store'])->name('user.store');
