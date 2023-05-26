<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function() {
    return view('home');
});

Route::get('/guy/{id}', function($id) {
    return "Hello guy $id!";
});

Route::get('/about-xyz', function() {
    return "About page";
})->name('about');

Route::prefix('admin')->group(function() {
    Route::get('/', function(){
        return "Admin page";
    });

    Route::get('/users', function() {
        return 'See all users';
    });
});

Route::get('/users', [UserController::class, 'index']);

Route::get('/blogs', [BlogController::class, 'index']);