@extends('layouts.app')

@section('content')
    <div class="pagetitle d-flex">
        <h1 class="text-capitalize">Create Category</h1>
        <a href="{{ route('articles.index') }}" class="btn btn-dark ms-auto">
            <i class="bi bi-arrow-bar-left"></i>
            Back
        </a>
    </div>


 
        <div class="row">
          <div class="col-lg-12">
  
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Article Form</h5>
  
                @if (session('success'))
                    <div>{{session('success')}}</div>
                @endif
                
                @if ($errors->any())
                  @foreach ($errors->all() as $error )
                    {{$error}} <br>
                  @endforeach
                @endif


                <!-- Article Form-->
                <form action="{{route('articles.store')}}" method="POST" enctype="multipart/form-data"> 
                  @csrf

                  <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label" >Title</label>
                    <div class="col-sm-6">
                      <input type="text" name="title" class="form-control"  placeholder="enter the titlename">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Youtube Url</label>
                    <div class="col-sm-6">
                      <input type="text" name="youtube_url" class="form-control"  placeholder="enter Url...">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Vimeo Url</label>
                    <div class="col-sm-6">
                      <input type="text" name="vimeo_url" class="form-control"  placeholder="enter Url...">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="InputText" class="col-sm-2 col-form-label">Category</label>
                    <div class="col-sm-6">
                        <select name="category" id="category" class="form-control">
                          <option value="0">~ Select Category ~</option>
                            @foreach($category as $cate)
                            <option value="{{ $cate->id }}">{{$cate->myanmar_name}}-{{$cate->english_name}}</option>
                            @endforeach
                          </select>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="InputText" class="col-sm-2 col-form-label">Type</label>
                    <div class="col-sm-6">
                        <select name="type" id="type" class="form-control">
                            <option value="image">Image</option>
                            <option value="video">Video</option>
                            </select>
                    </div>
                  </div>
            
            
                  <div class="row mb-3">
                    <label for="" class="col-sm-2 col-form-label">Image</label>
                    <div class="col-sm-6">
                      <input type="file" class="form-control article_image" name="article_image">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="InputText" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-6">
                        <textarea name="description" id="description"  class="form-control" cols="30" rows="10" placeholder="description"></textarea>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="date" class="col-sm-2 col-form-label">Published Date</label>
                    <div class="col-sm-6">
                        <input type="date" class="form-control" id="published_date" name="published_date">
                    </div>
                  </div>
                

  
                  <div class="row mb-3">
                   
                    <div class="col-sm-6">
                      <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                  </div>
  
                </form>
  
              </div>
            </div>
  
          </div>
  
    
        </div>
   


@endsection
