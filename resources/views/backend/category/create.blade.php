@extends('backend.layouts.master')

@section('content')



    <div class="container-fluid">
        <h1 class="h3 mb-4 text-gray-800">Create Category</h1>
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
              <form class="row g-3" method="POST" action="{{ route('category.store') }}" enctype="multipart/form-data">
              @csrf
              
              <div class="col-md-12">
                  <div class="form-floating">
                    <input type="text" class="form-control" name="name" id="floatingName" placeholder="Your Name">
                    <label for="floatingName"> Name</label>
                      @error('name')
                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                
              
                <div class="col-12">
                  <div class="form-floating">
                    <textarea class="form-control" name="description" placeholder="Address" id="floatingTextarea" style="height: 100px;"></textarea>
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
                <div class="text-center">
                  <button type="submit" class="btn btn-primary">Submit</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
              </form><!-- End floating Labels Form -->

              </div>


@endsection