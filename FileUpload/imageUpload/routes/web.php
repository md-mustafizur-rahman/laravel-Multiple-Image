<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DatabaseController;



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

Route::get('/registar', [DatabaseController::class, 'AddUser']);
Route::get('/', [DatabaseController::class, 'Login']);
Route::get('/logout', [DatabaseController::class, 'logout']);
Route::post('/login', [DatabaseController::class, 'loginData']);
Route::post('/addUser', [DatabaseController::class, 'registarUser']);
Route::post('/store', [DatabaseController::class, 'store']);
Route::get('/addimage', [DatabaseController::class, 'addimage']);
Route::get('/show', [DatabaseController::class, 'show']);