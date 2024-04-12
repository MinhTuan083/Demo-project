<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\CustomAuthController;
Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', function () {
    return view('home');
    // $user = new User();
    // $alluser = $user::all();
    // dd($alluser);
});
Route::get('/htmll', function(){
    return view('form');
    // $html = '<h1>Hoc get lap trinh web</h1>';
    // return $html;
});
Route::post('/htmll', function(){
    return '<h1>Hoc post lap trinh web</h1>';

}); 
Route::get('dashboard', [CustomAuthController::class, 'dashboard']);
Route::get('login', [CustomAuthController::class, 'index'])->name('login');
Route::post('custom-login', [CustomAuthController::class, 'customLogin'])->name('login.custom');
Route::get('registration', [CustomAuthController::class, 'registration'])->name('register-user');
Route::post('custom-registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom');
Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');
Route::post('registration', [CustomAuthController::class, 'customRegistration'])->name('register.custom');