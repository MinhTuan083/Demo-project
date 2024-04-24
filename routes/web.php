<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\CustomAuthController;
Route::get('/', function () {
    return view('welcome');
});

Route::get('dashboard', [CustomAuthController::class, 'dashboard']);
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom');
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');
Route::post('registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom');

Route::get('list', [CustomAuthController::class, 'listUser'])->name('user.list');
Route::get('create', [CustomAuthController::class, 'createUser'])->name('createUser');
Route::post('create', [CustomAuthController::class, 'postUser'])->name('crud_user.postUser');
Route::get('delete', [CustomAuthController::class, 'deleteUser'])->name('crud_user.deleteUser');
Route::get('list', [CustomAuthController::class, 'listUser'])->name('list');
Route::get('read-user/{id}', [CustomAuthController::class, 'readUser'])->name('read.user');
Route::get('edit-user/{id}', [CustomAuthController::class, 'editUser'])->name('edit.user');
Route::get('update-user/{id}', [CustomAuthController::class, 'updateUser'])->name('update.user');

