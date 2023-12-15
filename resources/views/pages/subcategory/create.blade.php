@extends('layouts.app')

@section('content')
    <div class="pagetitle d-flex">
        <h1 class="text-capitalize">Create Category</h1>
        <a href="{{ route('subcategories.index') }}" class="btn btn-dark ms-auto">
            <i class="bi bi-arrow-bar-left"></i>
            Back
        </a>
    </div>


 
        <div class="row">
          <div class="col-lg-12">
  
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">SubCategory Form</h5>
  
                @if (session('success'))
                    <div>{{session('success')}}</div>
                @endif
                
                @if ($errors->any())
                  @foreach ($errors->all() as $error )
                    {{$error}} <br>
                  @endforeach
                @endif


                <!-- subcategory Form-->
                <form action="{{route('subcategories.store')}}" method="POST" enctype="multipart/form-data"> 
                  @csrf

                  <div class="row mb-3">
                    <label for="InputText" class="col-sm-2 col-form-label">Category</label>
                    <div class="col-sm-6">
                        <select name="category" id="category" class="form-control">
                          <option value="0">~ Select Category ~</option>
                            @foreach($category as $cate)
                            <option value="{{ $cate->english_name }}">{{$cate->myanmar_name}}-{{$cate->english_name}}</option>
                            @endforeach


                            {{-- @foreach($category as $cate)
                            <option value="{{ $cate->english_name }}-{{$cate->myanmar_name}}">{{$cate->myanmar_name}}-{{$cate->english_name}}</option>
                            @endforeach --}}

                          </select>


                          


                    </div>
                  </div>
                  
            
                  <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label" >English Name</label>
                    <div class="col-sm-6">
                      <input type="text" name="english_name" class="form-control"  placeholder="enter the ename">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="inputEmail" class="col-sm-2 col-form-label">Myanmar Name</label>
                    <div class="col-sm-6">
                      <input type="text" name="myanmar_name" class="form-control"  placeholder="enter the mname">
                    </div>
                  </div>
            
                  <div class="row mb-3">
                    <label for="" class="col-sm-2 col-form-label">Image</label>
                    <div class="col-sm-6">
                      <input type="file" class="form-control subcategory_image" name="subcategory_image">
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
