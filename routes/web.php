<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Auth;
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
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('students',StudentController::class);
Route::get('delete,{id}', [StudentController::class,'delete'])->name('delete');
Route::get('web/index', [App\Http\Controllers\WebController::class,'indexs'])->name('web.index');
Route::post('/storeComment', [App\Http\Controllers\HomeController::class,'storeComment'])->name('storeComment');
