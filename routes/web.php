<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\FileController;


//Home
//----------------------------------------------------
Route::get('/', [HomeController::class, 'index'])->name('home.index');

//Student
//----------------------------------------------------
Route::get('/students', [StudentController::class, 'index'])->name('student.index')->middleware('auth');
Route::get('/student/{student}', [StudentController::class, 'show'])->name('student.show')->middleware('auth');
// Route::get('/student-create', [StudentController::class, 'create'])->name('student.create');
// Route::post('/student-create', [StudentController::class, 'store'])->name('student.store');
Route::get('/student-edit/{student}', [StudentController::class, 'edit'])->name('student.edit')->middleware('auth');
Route::put('/student-edit/{student}', [StudentController::class, 'update'])->name('student.edit')->middleware('auth');
Route::delete('/student/{student}', [StudentController::class, 'destroy'])->name('student.delete')->middleware('auth');

//Authentication
//----------------------------------------------------
Route::get('/registration',[CustomAuthController::class, 'create'])->name('registration');
Route::post('/registration',[CustomAuthController::class, 'store']);
Route::get('/login',[CustomAuthController::class, 'index'])->name('login');
Route::post('/authentication',[CustomAuthController::class, 'authentication'])->name('authentication');
Route::get('/logout',[CustomAuthController::class, 'logout'])->name('logout');

//Forum
//----------------------------------------------------
Route::get('/articles', [ArticleController::class, 'index'])->name('article.index')->middleware('auth');
Route::get('/article/{article}', [ArticleController::class, 'show'])->name('article.show')->middleware('auth');
Route::get('/article-create', [ArticleController::class, 'create'])->name('article.create')->middleware('auth');
Route::post('/article-create', [ArticleController::class, 'store'])->name('article.store')->middleware('auth');
Route::get('/article-edit/{article}', [ArticleController::class, 'edit'])->name('article.edit')->middleware('auth');
Route::put('/article-edit/{article}', [ArticleController::class, 'update'])->name('article.edit')->middleware('auth');
Route::delete('/article/{article}', [ArticleController::class, 'destroy'])->name('article.delete')->middleware('auth');

//Upload
//----------------------------------------------------
Route::get('/files', [FileController::class, 'index'])->name('files.index')->middleware('auth');
Route::get('/file-create', [FileController::class, 'create'])->name('files.create')->middleware('auth');
Route::post('/file-create', [FileController::class, 'store'])->name('files.store')->middleware('auth');
Route::get('/file-edit/{file}', [FileController::class, 'edit'])->name('files.edit')->middleware('auth');
Route::put('/file-edit/{file}', [FileController::class, 'update'])->name('files.edit')->middleware('auth');
Route::delete('/file/{file}', [FileController::class, 'destroy'])->name('files.delete')->middleware('auth');

Route::get('/files/{file}', [FileController::class, 'download'])->name('files.download')->middleware('auth');
