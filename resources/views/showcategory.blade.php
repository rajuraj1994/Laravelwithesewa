@extends('admin.layout')
@section('title','All Category')

@section('content-section')
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-md-5">
                @if(Session::has('msg'))
                    <div class="alert alert-success">
                        {{Session::get('msg')}}
                    </div>
                    @endif
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Category Name</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $item)
                        <tr>
                            <td>{{$item->category_name}}</td>
                            <td>
                                <a href="{{route('editcategory',$item->id)}}" class="btn btn-primary">Edit</a>
                                <a href="{{route('deletecategory',$item->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure want to delete this category?')">Delete</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection