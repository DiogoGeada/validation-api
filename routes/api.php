<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KeyController;

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

Route::post('/key/activate', [KeyController::class, 'Activate']);
<<<<<<< HEAD
Route::post('/key/check', [KeyController::class, 'Check']);
=======
Route::post('/key/check', [KeyController::class, 'Check']);
>>>>>>> main
