<?php

use App\Http\Controllers\Api\HomeController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/landing', [HomeController::class, 'landings']);
Route::post('/landing/read-more', [HomeController::class, 'landingReadMore']);
Route::get('/services', [HomeController::class, 'services']);
Route::get('/articles', [HomeController::class, 'articles']);
Route::get('/latest-news', [HomeController::class, 'latestNews']);
Route::post('/latest-news/read-more', [HomeController::class, 'latestNewsReadMore']);
Route::get('/martyrs', [HomeController::class, 'martyrs']);
Route::get('/footer', [HomeController::class, 'footerLinks']);
