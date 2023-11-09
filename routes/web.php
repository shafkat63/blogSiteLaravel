<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ArticleController;
use App\Models\Articles;
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

// Route::get('/', function () {
//     return view('index');
// });

Route::get('/', [ArticleController::class, 'index']);

// Route::get('/register', function () {
//     return view('users.register');
// });


Route::get('/register', [UserController::class, 'create'])->middleware('guest');
Route::post('/users', [UserController::class, 'store']);
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');
Route::post('/users/authenticate', [UserController::class, 'authenticate']);
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth');


// Show Create Form
Route::get('/article/create', [ArticleController::class, 'create'])->middleware('auth');
Route::post('/article', [ArticleController::class, 'store'])->middleware('auth');
Route::put('/article/edit/{articles}', [ArticleController::class, 'update'])->middleware('auth');
Route::get('/article/edit/{articles}', [ArticleController::class, 'edit'])->middleware('auth');

Route::get('/article/{article}', [ArticleController::class, 'show']);
Route::delete('/article/{articles}', [ArticleController::class, 'destroy'])->middleware('auth');
// Show Edit Form
