<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Website\AboutController;
use App\Http\Controllers\Website\HomeController;
use App\Http\Controllers\Website\ContactController;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', action: [HomeController::class,'index'])->name('home');
Route::get('/contact', action: [ContactController::class,'index'])->name('contact');
Route::get('/about', action: [AboutController::class,'index'])->name('about');