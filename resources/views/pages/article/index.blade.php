@extends('layouts.app')

@section('content')
    <div class="pagetitle d-flex">
        <h1 class="text-capitalize">Article List</h1>
       
        <a href="{{ route('articles.create') }}" class="btn btn-primary ms-auto">
            <i class="bi bi-plus-square"></i>
            Create
        </a>
    </div>

    @if(Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{ Session::get('success') }}
    </div>
@endif

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th >No:</th>
                            <th class="text-center">Title</th>
                            <th class="text-center">Description</th>
                            <th class="text-center" width="10%">Date</th>
                            <th class="text-center" width="20%">Actions</th>
                        </tr>
                    </thead>

               
                    <tbody>   
                        @if ($articles->count()> 0)
                            
                    
                        @foreach ($articles as $art)
                            
                      
                        <tr>
                            <td>{{$loop->iteration }}</td>
                            <td class="text-center">{{$art->title}}</td>
                            <td class="text-center">{{$art->description}}</td>
                            <td class="text-center" width="15%">{{ date('d-M-Y', strtotime($art['published_date'])) }}</td>

                            <div class="btn-group" role="group" aria-label="Basic example">
                            <td class="text-center">
                                {{-- <a href="{{ route('categories.edit', 1) }}">
                                    <i class="bi bi-pencil-square text-warning"></i>
                                </a>
                                <a href="{{ route('categories.destroy', $category->id) }}" class="ms-2"> 
                                     <i class="bi bi-trash3 text-danger"></i>
                                </a>  --}}



                                <a href="{{route('articles.edit', $art->id)}}" type="button" class="btn btn-warning">Edit</a>
                                <form action="{{ route('articles.destroy', $art->id) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
                                    @csrf
                                    @method('DELETE')


                                <button class="btn btn-danger m-0">Delete</button>
                            </td>
                        </div>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>

                
                </table>
            </div>
        </div>
    </div>
@endsection
