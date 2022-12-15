<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('/');



Route::get('registration', [UserController::class, 'registrationView'])->name('registration');
Route::post('registration', [UserController::class, 'registrationPost']);
Route::get('login', [UserController::class, 'loginView'])->name('login');
Route::post('login', [UserController::class, 'loginPost']);

Route::middleware('auth')->group(function (){
    Route::middleware('role:user,admin')->group(function (){

        Route::middleware('role:admin')->group(function (){
            Route::group(['prefix' => '/admin', 'as' => 'admin.'], function (){
                Route::resource('/product', ProductController::class);
            });
        });
    });
    Route::get('logout', [UserController::class, 'logout'])->name('logout');
});
