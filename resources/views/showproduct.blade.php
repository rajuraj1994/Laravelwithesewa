@extends('admin.layout')
@section('title','All Products')

@section('content-section')

    <div class="container my-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-10">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Category</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($products as $p)
                        <tr>
                            <td>{{$p->product_name}}</td>
                            <td>{{$p->product_price}}</td>
                            <td>{{$p->stock}}</td>
                            <td>{{$p->product_description}}</td>
                            <td><img src="{{asset('uploads')}}/{{$p->product_image}}" alt="{{$p->product_name}}" width="100"></td>
                            <td>{{$p->category->category_name}}</td>
                            <td>
                                <a href="{{route('editproduct',$p->id)}}" class="btn btn-primary"><i class="fa-solid fa-pen-to-square"></i></a>
                                <br>
                                <a href="{{route('deleteproduct',$p->id)}}" class="btn btn-danger" onclick="return confirm('Are sure to delete this product?')"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection