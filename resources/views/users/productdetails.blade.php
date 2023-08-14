@extends('users.master')
@section('title','Product Details')

@section('main-content')
<!--  start of product section -->
<div class="container my-5">
    <div class="row d-flex justify-content-between align-items-center">
        <div class="col-md-3">
            <img src="{{asset('uploads')}}/{{$product->product_image}}" alt="{{$product->product_name}}" width="300">
        </div>
        <div class="col-md-8">
            @if(Session::has('msg'))
                    <div class="alert alert-success">
                        {{Session::get('msg')}}
                    </div>
                    @endif
                    @if(Session::has('error'))
                    <div class="alert alert-danger">
                        {{Session::get('error')}}
                    </div>
                    @endif
            <h1>{{$product->product_name}}</h1>
            <h1>Rs {{$product->product_price}}</h1>
            <strong>Category: {{$product->category->category_name}}</strong>
            <br>
            <strong>Available Stock: {{$product->stock}}</strong>
            <p>{{$product->product_description}}</p>
            <div class="my-3">
                <form action="{{route('addtocart',$product->id)}}" method="post">
                    @csrf
                    <input type="hidden" name="quantity" value="1">
                    <input type="submit" value="Add to Cart" class="btn btn-warning">
                </form>
            </div>
        </div>
    </div>
</div>


<!-- end of product section -->
@endsection