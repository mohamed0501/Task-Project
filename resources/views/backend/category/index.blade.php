@extends('backend.layouts.master')

@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Categories</h1>
    <a href="{{ route('category.create') }}" class="btn btn-primary mb-3">Add New Category</a>
         <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">created At</th>
                    <th scope="col">Actions</th>
                    
                  </tr>
                </thead>
                <tbody>
                    @forelse($categories as $category)


                  <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td><img src="{{ asset('storage/' . $category->image) }}" alt="Category Image" width="100"></td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->created_at }}</td>
                    <td>
                        <a href="{{ route('category.edit', $category) }}" class="btn btn-sm btn-info">Edit</a>
                        <form action="{{ route('category.destroy', $category) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                  </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">No categories found.</td>
                        </tr>
                        @endforelse
                </tbody>
              </table>
    </div>
@endsection