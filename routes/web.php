<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\DashboardController;
use GuzzleHttp\Middleware;
use App\Http\Controllers\Website\AboutController;
use App\Http\Controllers\Website\HomeController;
use App\Http\Controllers\Website\ContactController;
use App\Http\Middleware\IsAdmin;
use App\Models\Category;
use App\Models\Post;


 Route::get('/', action: [HomeController::class,'index'])->name('home');
Route::get('/contact', action: [ContactController::class,'index'])->name('contact');
Route::get('/about', action: [AboutController::class,'index'])->name('about');
Route::get('/categories', action: [App\Http\Controllers\Website\PageController::class,'category'])->name('website.category');
Route::get('/category/{id}/posts', action: [App\Http\Controllers\Website\PageController::class,'categoryPosts'])->name('post.category');



// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified',IsAdmin::class])->name('dashboard');
 Route::prefix('admin')->middleware(['auth',IsAdmin::class])->group(function () {
Route::get('/dashboard', action: [DashboardController::class,'index'])->name('dashboard');
Route::resource('category', App\Http\Controllers\Backend\Category\CategoryController::class);
Route::resource('post', App\Http\Controllers\Backend\Post\PostController::class);
});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';




// <?php

// use App\Http\Controllers\Backend\DashboardController;
// use GuzzleHttp\Middleware;
// use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Website\AboutController;
// use App\Http\Controllers\Website\HomeController;
// use App\Http\Controllers\Website\ContactController;
// use App\Http\Middleware\IsAdmin;
// use App\Models\Category;
// use App\Models\Post;

// // Route::get('/', function () {
// //     return view('welcome');
// // });


// Route::get('/', action: [HomeController::class,'index'])->name('home');
// Route::get('/contact', action: [ContactController::class,'index'])->name('contact');
// Route::get('/about', action: [AboutController::class,'index'])->name('about');
// Route::get('/categories', action: [App\Http\Controllers\Website\PageController::class,'category'])->name('website.category');
// Route::get('/category/{id}/posts', action: [App\Http\Controllers\Website\PageController::class,'categoryPosts'])->name('post.category');


// // Route::get('category-fake',function(){

// //         Category:: factory()->count(10)->create();
// // });
// // Route::get('post-fake',function(){
// //         Post:: factory()->count(100)->create();
// // });

// Route::get('/postdetails', function(){
    
//     return view('website.postdetails');
// })->name('post.details');



// Route::prefix('admin')->middleware([IsAdmin::class])->group(function () {
// Route::get('/dashboard', action: [DashboardController::class,'index'])->name('dashboard');
// Route::resource('category', App\Http\Controllers\Backend\Category\CategoryController::class);
// Route::resource('post', App\Http\Controllers\Backend\Post\PostController::class);
// });



Route::get('/test', function () {
    return view('mail.welcome_mail');
});