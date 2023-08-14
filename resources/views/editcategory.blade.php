@extends('admin.layout')
@section('title','Update Category')

@section('content-section')
    <div class="container my-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-5">
                <form action="{{route('updatecategory',$category->id)}}" method="post" class="shadow p-3">
                    @csrf
                    <h2 class="text-center">Edit category Form</h2>
                    @if(Session::has('msg'))
                    <div class="alert alert-success">
                        {{Session::get('msg')}}
                    </div>
                    @endif
                    <label for="category">Category Name</label>
                    <input type="text" name="category" id="category" class="form-control" value="{{$category->category_name}}">
                    <div class="my-2">
                        <input type="submit" value="Update" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection