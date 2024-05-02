<?php

use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\CustomAuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/htmll', function () {
    return view('form');
});

Route::post('/htmll', function () {
    return '<h1>Học post lập trình web</h1>';
});

Route::get('dashboard', [CustomAuthController::class, 'dashboard']);
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom');
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');
Route::get('list', [CustomAuthController::class, 'listUser'])->name('user.list');
Route::get('create', [CustomAuthController::class, 'createUser'])->name('createUser');
Route::post('create', [CustomAuthController::class, 'postUser'])->name('crud_user.postUser');
Route::get('delete', [CustomAuthController::class, 'deleteUser'])->name('crud_user.deleteUser');
Route::get('edit-user/{id}', [CustomAuthController::class, 'editUser'])->name('edit.user');
Route::post('update-user/{id}', [CustomAuthController::class, 'updateUser'])->name('update.user');
Route::get('hacker/xss', [CustomAuthController::class, 'xss'])->name('xss');
Route::get('read', [CustomAuthController::class, 'readUser'])->name('user.readUser');
Route::get('favorite', [FavoriteController::class, 'listFav'])->name('crud_user.favorite');
Route::get('post', [PostController::class, 'listPost'])->name('crud_user.post');
