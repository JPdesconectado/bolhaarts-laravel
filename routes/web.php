<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Http\Controllers\ArtController;

Route::get('/', [ArtController::class, 'index']);
Route::get('/arts/create', [ArtController::class, 'create'])->middleware('auth');
Route::get('/arts/{id}', [ArtController::class, 'show']);
Route::post('/arts', [ArtController::class, 'store']);
Route::delete('/arts/{id}', [ArtController::class, 'destroy']);

Route::get('/arts/edit/{id}', [ArtController::class, 'edit'])->middleware('auth');
Route::put('/arts/update/{id}', [ArtController::class, 'update'])->middleware('auth');


Route::get('/dashboard', [ArtController::class, 'dashboard'])->middleware('auth');


