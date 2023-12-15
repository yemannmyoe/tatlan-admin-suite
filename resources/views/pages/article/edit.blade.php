@extends('layouts.app')

@section('content')
    <div class="pagetitle d-flex">
        <h1 class="text-capitalize">Edit Article</h1>
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
                <form action="{{ route('articles.update', $article->id) }}" method="POST" enctype="multipart/form-data"> 
                    @csrf
                    @method('PUT')

                  <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label" >Title</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" value="{{ $article->title }}" name="title">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Youtube Url</label>
                    <div class="col-sm-6">
                        <input type="text" name="youtube_url" class="form-control" value="{{ $article->youtube_url }}" >
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label">Vimeo Url</label>
                    <div class="col-sm-6">
                        <input type="text" name="vimeo_url" class="form-control" value="{{ $article->vimeo_url }}" >
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="InputText" class="col-sm-2 col-form-label">Category</label>
                    <div class="col-sm-6">
                        <select name="category" id="category" class="form-control">
                  
                            @foreach($category as $cate)
                            <option value="{{ $cate->id }}" {{$cate->id == $article->category ? 'selected' : ''}}>{{ $cate->myanmar_name }}-{{$cate->english_name}}</option>
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
                    <label for="" class="col-sm-2 col-form-label" >Current Image:</label>
                    <div class="col-sm-3">
                      <img src="{{asset('uploads/'.$article->article_image)}}" alt="" style="width:70px;"> 
                  </div>
                  </div>
                  <div class="row mb-3">
                    <label for="" class="col-sm-2 col-form-label">Image</label>
                    <div class="col-sm-6">
                        <input type="file" class="form-control article_image" name="article_image" value="{{$article->article_image}}">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="InputText" class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-6">
                        <textarea type="text" name="description" class="form-control" value="{{ $article->description }}" >{{$article->description}}</textarea>
                    </div>
                  </div>

                  <div class="row mb-3">
                    @if ($article->published_date !=null)
                    <label for="date" class="col-sm-2 col-form-label">Published Date</label>
                    <div class="col-sm-6">
                        <input type="date" class="form-control" id="published_date" name="published_date" value="{{$format_published_date}}">
                    </div>
                    @endif
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
