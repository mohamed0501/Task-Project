<?php

use App\Http\Controllers\Backend\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Website\AboutController;
use App\Http\Controllers\Website\HomeController;
use App\Http\Controllers\Website\ContactController;
use App\Models\Category;
use App\Models\Post;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', action: [HomeController::class,'index'])->name('home');
Route::get('/contact', action: [ContactController::class,'index'])->name('contact');
Route::get('/about', action: [AboutController::class,'index'])->name('about');



Route::get('/dashboard', action: [DashboardController::class,'index'])->name('dashboard');
Route::resource('category', App\Http\Controllers\Backend\Category\CategoryController::class);
Route::resource('post', App\Http\Controllers\Backend\Post\PostController::class);

// Route::get('category-fake',function(){
//         Category:: factory()->count(10)->create();
// });
// Route::get('post-fake',function(){
//         Post:: factory()->count(100)->create();
// });