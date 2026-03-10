@extends('backend.layouts.master')

@section('content')



    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Create Post</h1>
<!-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif -->
 <!-- Floating Labels Form -->
              <form class="row g-3" method="POST" action="{{ route('post.store') }}" enctype="multipart/form-data">
              @csrf
              
              <div class="col-md-12">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="title" id="floatingTitle" placeholder="Post Title">
                    <label for="floatingTitle">Post Title</label>
                      @error('title')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                
              
                <div class="col-12">
                  <div class="form-floating">
                    <textarea class="form-control" name="content" placeholder="Content" id="floatingTextarea" style="height: 100px;"></textarea>
                    <label for="floatingTextarea">Content</label>
                      @error('content')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                  </div>
                </div>

                 <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Select</label>
                  <div class="col-sm-10">
                   
                    <select class="form-select mt-3" name="category_id" aria-label="Default select example">
                      <option selected>Open this select menu</option>
                          @foreach ($categories as $category )  
                      <option value="{{ $category->id }}">{{ $category->name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
               
               
                <div class="col-md-2">
                  <div class="form-floating">
                    <input type="file" class="form-control" name="image" id="floatingimage" placeholder="image">
                    <label for="floatingimage">Image</label>
                  </div>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
              </form><!-- End floating Labels Form -->

              </div>


@endsection