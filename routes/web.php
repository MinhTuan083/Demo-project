<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\CustomAuthController;


Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom');
Route::post('registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom');
Route::get('create', [CustomAuthController::class, 'createUser'])->name('createUser');
Route::post('create', [CustomAuthController::class, 'postUser'])->name('crud_user.postUser');
Route::get('delete', [CustomAuthController::class, 'deleteUser'])->name('crud_user.deleteUser');


