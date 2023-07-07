<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogApiController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/api/blogs', [BlogApiController::class, 'index']);

Route::get('/api/blog/{id}', [BlogApiController::class, 'show']);

Route::post('/api/blog', [BlogApiController::class, 'store']);

Route::patch('/api/blog/{id}', [BlogApiController::class, 'update']);

Route::delete('/api/blog/{id}', [BlogApiController::class, 'destroy']);
