<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::name('books.')->group(function () {
	Route::get('old-books', [BookController::class, 'oldBooks'])->name('old_books');
});

Route::name('authors.')->group(function () {
	Route::get('super-authors', [AuthorController::class, 'superAuthors'])->name('super_authors');
	Route::get('old-school', [AuthorController::class, 'oldSchool'])->name('old_school');
});
