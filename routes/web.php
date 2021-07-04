<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

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


Auth::routes();

Route::resource('books', BookController::class);

Route::get('/',  [App\Http\Controllers\BookController::class, 'index'])->middleware('auth');

Route::post('/livros/salvar', [App\Http\Controllers\BookController::class, 'store'])->name('books.store')->middleware('auth');
Route::get('/livros/novo', [App\Http\Controllers\BookController::class, 'create'])->name('books.create')->middleware('auth');
Route::get('/livros', [App\Http\Controllers\BookController::class, 'index'])->name('books.index')->middleware('auth');;
