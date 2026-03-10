<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
       $posts = Post::with('category')->latest()->paginate(10); 
       $categories = Category::all();
        return view('website.home', compact('posts', 'categories'));
    }
}
