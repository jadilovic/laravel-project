<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\JobController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', function () {
    return view('home');
})->name('home');

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

Route::get('/blogs', [BlogController::class, 'index'])->name('blogs');

Route::get('/jobs', [JobController::class, 'index'])->name('jobs');

require __DIR__.'/auth.php';
