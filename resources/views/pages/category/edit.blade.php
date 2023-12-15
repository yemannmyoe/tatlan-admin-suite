@extends('layouts.app')

@section('content')
    <div class="pagetitle d-flex">
        <h1 class="text-capitalize">Edit Category</h1>
        <a href="{{ route('categories.index') }}" class="btn btn-dark ms-auto">
            <i class="bi bi-arrow-bar-left"></i>
            Back
        </a>
    </div>

    <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Category Form</h5>
              @if (session('success'))
              <div>{{session('success')}}</div>
          @endif
          
          @if ($errors->any())
            @foreach ($errors->all() as $error )
              {{$error}} <br>
            @endforeach
          @endif
              <!-- Category Form-->
              <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data"> 
                @csrf
                @method('PUT')

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label" >English Name</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" value="{{ $category->english_name }}" name="english_name">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label" >Myanmar Name</label>
                  <div class="col-sm-6">
                    <input type="text" class="form-control" value="{{ $category->myanmar_name }}" name="myanmar_name">
                  </div>
                </div>

                <div class="row mb-3">
                  <label for="" class="col-sm-2 col-form-label" >Current Image:</label>
                  <div class="col-sm-3">
                    <img src="{{asset('uploads/'.$category->category_image)}}" alt="" style="width:70px;"> 
                </div>
                </div>

                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label" > Image</label>
                  <div class="col-sm-6">
                    <input type="file" class="form-control category_image" name="category_image" value="{{$category->category_image}}">
                  </div>
                </div>
                
              


                <div class="row mb-3">
                 
                  <div class="col-sm-6">
                    <button type="submit" class="btn btn-primary">Update</button>
                  </div>
                </div>

              </form>

            </div>
          </div>

        </div>

  
      </div>
@endsection
