<?php

use App\Http\Controllers\AuthenticationController;
use App\Http\Controllers\GigController;

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


Route::post('/register', [AuthenticationController::class, 'register']);
Route::post('/login', [AuthenticationController::class, 'login']);

Route::post('/gigs', [GigController::class, 'createGig']);
Route::get('/gigs', [GigController::class, 'listGigs']);
Route::get('/gigs/{id}', [GigController::class, 'showGig']);

Route::get("/test", function (Request $request) {
    return "Hello everyone";
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
// Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


