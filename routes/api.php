<?php

use App\Http\Controllers\ChickController;
use App\Http\Controllers\ParentController;
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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::post('login', [UserController::class, 'login']);
// Route::post('register', [UserController::class, 'register']);

// Route::middleware('auth:sanctum')->group(function () {
//     // Pair
//     Route::get('pair/list', [ParentController::class, 'index']);
//     Route::post('/pair', [ParentController::class, 'store']);
//     Route::get('pair/{pair}/edit', [ParentController::class, 'edit']);
//     Route::put('/pair/{pair}', [ParentController::class, 'update']);

//     // Chick
//     Route::get('chick/{pair}', [ChickController::class, 'parentChicks']);
//     Route::post('chick', [ChickController::class, 'store']);
//     Route::get('chick/{chick}/detail', [ChickController::class, 'edit']);
//     Route::put('chick/{chick}', [ChickController::class, 'update']);

// });
