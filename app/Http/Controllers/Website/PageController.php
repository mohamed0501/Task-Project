<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class PageController extends Controller
{
    // public function about(){
    //     return view('website.about');
    // }

    //  public function contact(){
    //     return view('website.contact');
    // }
    
     public function category(){
        $categories = Category::all();
        return view('website.category', compact('categories'));
     }
     public function categoryPosts($id){
        // $category = Category::findOrFail($id);
        // $posts = $category->posts()->latest()->paginate(10);
        $category = Category::with('posts')->findOrFail($id);
        $posts = $category->posts()->latest()->paginate(10);
        return view('website.category-posts', compact('category', 'posts'));
     }
}
