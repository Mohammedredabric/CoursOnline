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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia\Inertia::render('Dashboard');
})->name('dashboard');


Route::group(['auth:sanctum', 'verified'],function (){
    Route::get('/courses',[\App\Http\Controllers\CourseController::class,'index'])->name('courses');
    Route::get('/course/{id}',[\App\Http\Controllers\CourseController::class,'show'])->name('course.show');
    Route::post('/courses',[\App\Http\Controllers\CourseController::class,'store'])->name('course.store');

    Route::post('/toggeleProgresspplu',[\App\Http\Controllers\CourseController::class,'toggeleProgress'])->name('course.toggeleProgress');
    Route::get('/dashboard',function (){return Inertia\Inertia::render('Dashboard');})->name('dashboard');
});
