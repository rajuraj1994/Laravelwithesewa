@extends('admin.layout')
@section('title','Update Product')

@section('content-section')
    <div class="container my-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-5">
                <form action="" method="post" class="shadow p-3" enctype="multipart/form-data">
                    <h2 class="text-center text-muted">Edit Product Form</h2>
                    @if(Session::has('msg'))
                    <div class="alert alert-success">
                        {{Session::get('msg')}}
                    </div>
                    @endif
                    @csrf 
                    <div class="mb-2">
                        <label for="pname">Product Name</label>
                        <input type="text" name="pname" id="pname" class="form-control" value="{{$product->product_name}}">
                    </div>
                    <div class="mb-2">
                        <label for="price">Product Price</label>
                        <input type="number" name="price" id="price" class="form-control" value="{{$product->product_price}}">
                    </div>
                    <div class="mb-2">
                        <label for="stock">Stock</label>
                        <input type="number" name="stock" id="stock" class="form-control" value="{{$product->stock}}">
                    </div>
                    <div class="mb-2">
                        <label for="description">Product Description</label>
                        <textarea name="desc" id="description" cols="30" rows="5" class="form-control">{{$product->product_description}}</textarea>
                    </div>
                    <div class="mb-2">
                        <label for="image">Product Image</label>
                        <input type="file" name="image" id="image" class="form-control">
                    </div>
                    <div class="mb-2">
                        <label for="category">Category</label>
                        <select name="category" id="category" class="form-control">
                            <option value="{{$product->category_id}}">{{$product->category->category_name}}</option>
                            @foreach($categories as $c)
                            <option value="{{$c->id}}">{{$c->category_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-2">
                        <input type="submit" value="Update" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection