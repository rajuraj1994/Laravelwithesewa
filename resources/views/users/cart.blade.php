@extends('users.master')
@section('title','Cart Items')

@section('main-content')
<!-- start of cart section -->
<div class="container-fluid">
<div class="row d-flex justify-content-center">
    <div class="col-md-10">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Unit Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cartItems as $cart)
                <tr>
                    <td><img src="{{asset('uploads')}}/{{$cart->products->product_image}}" alt="{{$cart->products->product_name}}" width="60"></td>
                    <td>{{$cart->products->product_name}}</td>
                    <td>Rs {{$cart->products->product_price}}</td>
                    <td>
                        <a href="{{route('buy',$cart->id)}}" class="btn btn-success">Buy Now</a>
                        <a href="#" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>

<!-- end of product section -->
@endsection