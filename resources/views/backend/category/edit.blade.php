@extends('backend.layouts.master')

@section('content')



    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Update Category</h1>

 <!-- Floating Labels Form -->
              <form class="row g-3" method="POST" action="{{ route('category.update', $category->id) }}" enctype="multipart/form-data">
              @csrf
              @method('PUT')

              <div class="col-md-12">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="name" value="{{ $category->name }}" id="floatingName" placeholder="Your Name">
                    <label for="floatingName"> Name</label>
                      @error('name')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                
              
                <div class="col-12">
                  <div class="form-floating">
                    <textarea class="form-control"  name="description" placeholder="Address" id="floatingTextarea" style="height: 100px;">{{ $category->description }} </textarea>
                    <label for="floatingTextarea">Description</label>
                      @error('description')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
               
               
                <div class="col-md-2">
                  <div class="form-floating">
                    <input type="file" class="form-control" name="image" id="floatingimage" placeholder="image">
                    <label for="floatingimage">Image</label>
                  </div>
                </div>
                 <div class="col-md-2">
                    <div class="form-floating">
                        <img src="{{ asset('storage/' . $category->image) }}" alt="Category Image" width="100">
                        <label for="floatingimage">Current Image</label>
                    </div>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form><!-- End floating Labels Form -->

              </div>


@endsection