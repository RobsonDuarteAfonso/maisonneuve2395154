<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CityController;

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
//     return view('welcome');
// });

Route::get('/', [StudentController::class, 'index'])->name('student.index');
Route::get('/students', [StudentController::class, 'index'])->name('student.index');
Route::get('/student/{student}', [StudentController::class, 'show'])->name('student.show');
Route::get('/student-create', [StudentController::class, 'create'])->name('student.create');
Route::post('/student-create', [StudentController::class, 'store'])->name('student.store');
Route::get('/student-edit/{student}', [StudentController::class, 'edit'])->name('student.edit');
Route::put('/student-edit/{student}', [StudentController::class, 'update'])->name('student.edit');
Route::delete('/student/{student}', [StudentController::class, 'destroy'])->name('student.delete');

//https://github.com/markitosanches/cadriciel22645/blob/main/my-blog/app/Http/Controllers/BlogPostController.php