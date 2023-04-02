<?php

use App\Http\Controllers\Api\News\NewsController;
use App\Http\Controllers\Api\Players\PlayerController;
use App\Http\Controllers\Api\Teams\TeamController;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->group(static function() {
    Route::get('/user', static function (Request $request) {
        return $request->user();
    });
    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/teams', [TeamController::class, 'index']);
Route::get('/players', [PlayerController::class, 'showAll']);
Route::get('/player/{id}', [PlayerController::class, 'showSingle']);
Route::get('/news', [NewsController::class, 'showAll']);
Route::get('/news/{id}', [NewsController::class, 'showSingle']);
