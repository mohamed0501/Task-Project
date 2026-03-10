@extends('backend.layouts.master')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">POSTS</h1>
    <a href="{{ route('post.create') }}" class="btn btn-primary mb-3">Add New Post</a>
         <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Image</th>
                    <th scope="col">Title</th>
                    <th scope="col">Category</th>
                    <th scope="col">Actions</th>
                    
                  </tr>
                </thead>
                <tbody>
                    @forelse($posts as $post)


                  <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td><img src="{{ asset('storage/' . $post->image) }}" alt="Post Image" width="100"></td>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->category->name }}</td>
                    <td>
                        <a href="{{ route('post.edit', $post) }}" class="btn btn-sm btn-info">Edit</a>
                        <form action="{{ route('post.destroy', $post) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                  </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">No posts found.</td>
                        </tr>
                        @endforelse
                </tbody>
              </table>
    </div>
@endsection