<?php

use App\Http\Controllers\BlogCommentController;
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

// PROFILE - AUTH ---------- PROFILE - AUTH //
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/dashboard', function () {
        return view('dashboard.dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

    // BLOGS -------- BLOGS ///
    Route::get('/dashboard/blogs', [BlogController::class, 'dashboardIndex'])->name('dashboard.blogs');
    Route::get('/dashboard/blogs/create', [BlogController::class, 'create'])->name('blogs.create');
    Route::post('/dashboard/blogs', [BlogController::class, 'store'])->name('blogs.store');

    Route::get('/dashboard/blogs/{id}/edit', [BlogController::class, 'edit'])->name('blogs.edit');
    Route::put('/dashboard/blogs/{id}', [BlogController::class, 'update'])->name('blogs.update');
    Route::delete('/dashboard/blogs/{id}', [BlogController::class, 'destroy'])->name('blogs.delete');

    Route::get('/blogs/filter/{category}', [BlogController::class, 'filter'])->name('blogs.filter');
    
    Route::get('/blogs/{blog}', [BlogController::class, 'show'])->name('blogs.show');
    Route::post('/comments', [BlogCommentController::class, 'store'])->name('comments.store');

    // JOBS --------- JOBS ///
    Route::get('/dashboard/jobs', [JobController::class, 'dashboardIndex'])->name('dashboard.jobs');
    Route::get('/dashboard/jobs/create', [JobController::class, 'create'])->name('jobs.create');
    Route::post('/dashboard/jobs', [JobController::class, 'store'])->name('jobs.store');

    Route::get('/dashboard/jobs/{id}/edit', [JobController::class, 'edit'])->name('jobs.edit');
    Route::put('/dashboard/jobs/{id}', [JobController::class, 'update'])->name('jobs.update');
    Route::delete('/dashboard/jobs/{id}', [JobController::class, 'destroy'])->name('jobs.delete');

    Route::get('/jobs/filter/{category}', [JobController::class, 'filter'])->name('jobs.filter');
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
require __DIR__.'/api.php';