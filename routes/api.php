<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\GigController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


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


// Authentication routes
Route::post('/register', [AuthenticationController::class, 'register']);
Route::post('/login', [AuthenticationController::class, 'login']);



// Gigs CRUD routes
Route::post('/gigs', [GigController::class, 'createGig']);
Route::get('/gigs', [GigController::class, 'listGigs']);
Route::get('/gigs/{id}', [GigController::class, 'getGig']);
Route::put('/gigs/{id}', [GigController::class, 'editGig']);
Route::delete('/gigs/{id}', [GigController::class, 'deleteGig']);



// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
// // Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/users', [UserController::class, 'gigs']);
