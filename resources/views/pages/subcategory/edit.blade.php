@extends('layouts.app')

@section('content')
    <div class="pagetitle d-flex">
        <h1 class="text-capitalize">Edit Subcategory</h1>
        <a href="{{ route('subcategories.index') }}" class="btn btn-dark ms-auto">
            <i class="bi bi-arrow-bar-left"></i>
            Back
        </a>
    </div>


 
        <div class="row">
          <div class="col-lg-12">
  
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Subcategory Form</h5>
  
                @if (session('success'))
                    <div>{{session('success')}}</div>
                @endif
                
                @if ($errors->any())
                  @foreach ($errors->all() as $error )
                    {{$error}} <br>
                  @endforeach
                @endif


                <!-- Article Form-->
                <form action="{{ route('subcategories.update', $subcategories->id) }}" method="POST" enctype="multipart/form-data"> 
                    @csrf
                    @method('PUT')

                  <div class="row mb-3">
                    <label for="InputText" class="col-sm-2 col-form-label">Category</label>
                    <div class="col-sm-6">
                      
                  
                         <select name="category" id="category" class="form-control">
                          
                          @foreach($category as $cate)
                          <option value="{{ $cate->english_name }}" {{$cate->english_name == $subcategories->category ? 'selected' : ''}}>
                             {{ $cate->myanmar_name }}-{{$cate->english_name}}
                            </option>
                          @endforeach

                          {{-- @foreach($category as $key => [$english_name, $myanmar_name])
                          <option value="{{ $key}}" {{ isset($subcategories) && $subcategories->category == $cate->id ? 'selected' : '' }}>
                              {{ $myanmar_name }}-{{ $english_name }}
                          </option>
                      @endforeach
                       --}}
                      

                      
            
                                </select>
    
                     

                    
                       
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label" >English Name</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" value="{{ $subcategories->english_name }}" name="english_name">
                    </div>
                  </div>
  
                  <div class="row mb-3">
                    <label for="inputText" class="col-sm-2 col-form-label" >Myanmar Name</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" value="{{ $subcategories->myanmar_name }}" name="myanmar_name">
                    </div>
                  </div>
                  

                  <div class="row mb-3">
                    <label for="" class="col-sm-2 col-form-label" >Current Image:</label>
                    <div class="col-sm-3">
                      <img src="{{asset('uploads/'.$subcategories->subcategory_image)}}" alt="" style="width:70px;"> 
                  </div>
                  </div>
                  <div class="row mb-3">
                    <label for="" class="col-sm-2 col-form-label">Image</label>
                    <div class="col-sm-6">
                        <input type="file" class="form-control subcategory_image" name="subcategory_image" value="{{$subcategories->subcategory_image}}">
                    </div>
                  </div>


                  <div class="row mb-3">
                    @if ($subcategories->published_date !=null)
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
