<?php

use App\Http\Controllers\ChickController;
use App\Http\Controllers\ParentController;
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

Auth::routes();

Route::group(['middleware' => 'auth'], function () {

    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user/store', [UserController::class, 'register'])->name('user.store');
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/{user}', [UserController::class, 'userPairs'])->name('users.pairs');

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/pairs', [ParentController::class, 'index'])->name('pairs.index');
    Route::get('/pairs/create', [ParentController::class, 'create'])->name('pairs.create');
    Route::get('/pairs/{pair}', [ParentController::class, 'edit'])->name('pairs.edit');
    Route::put('/pairs/{pair}', [ParentController::class, 'update'])->name('pairs.update');
    Route::delete('/pairs/{pair}', [ParentController::class, 'destroy'])->name('pairs.delete');
    Route::post('/pairs/store', [ParentController::class, 'store'])->name('pairs.store');

    Route::get('/pair/{pair}/chicks', [ChickController::class, 'parentChicks'])->name('pair.chicks');
    Route::get('/pair/{pair}/chicks/create', [ChickController::class, 'create'])->name('chick.create');
    Route::post('/pair/chick', [ChickController::class, 'store'])->name('chick.store');
    Route::get('/pair/chick/{chick}', [ChickController::class, 'edit'])->name('chick.edit');
    Route::put('/pair/chick/{chick}', [ChickController::class, 'update'])->name('chick.update');
    Route::delete('/pair/chick/{chick}', [ChickController::class, 'destroy'])->name('chick.destroy');

});
