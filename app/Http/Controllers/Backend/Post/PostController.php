<?php

namespace App\Http\Controllers\Backend\Post;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
//use Illuminate\Container\Attributes\Storage;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use App\Events\PostCreatedEvent;

class PostController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('category', 'user')->paginate(10);
        return view('backend.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {   

        $this->authorize('create-post');

      //  if(Gate::allows('create-post')){
            $categories = Category::all();
        return view('backend.post.create', compact('categories'));
     //   }
      //  abort(403);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'slug' => 'nullable|unique:posts,slug',
        ]);


        $data =$request->only('title','content','category_id','slug');
        if($request->hasFile('image')){
        $file = $request->file('image');
        $path=  Storage::disk('public')->put("post",$file);   
        $data['image'] = $path;

        }
    
        $post = Post::create($data);
        event(new PostCreatedEvent($post));
        return redirect()->route('post.index')->with('success', 'Post created successfully.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {   
        $this->authorize('edit-post', $post);
       //  if(Gate::allows('create-post',$post)){
            $categories = Category::all();
        return view('backend.post.edit', compact('post', 'categories'));
        //   }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
          $request->validate([
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);


        $data =$request->only('title','content','category_id');

        if($request->hasFile('image')){
            // Delete old image
            if ($post->image && Storage::disk('public')->exists($post->image)) {
                Storage::disk('public')->delete($post->image);
            }
            $file = $request->file('image');
            $path=  Storage::disk('public')->put("post",$file);   
            $data['image'] = $path;
        }
        $post->update($data);
        return redirect()->route('post.index')->with('success', 'Post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
            // Delete the category and its associated image
        if ($post->image && Storage::disk('public')->exists($post->image)) {
            Storage::disk('public')->delete($post->image);
        }
        $post->delete();
        return redirect()->route('post.index')->with('success', 'Post deleted successfully.');
    
    }
}
