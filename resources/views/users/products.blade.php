@extends('users.master')
@section('title','All Products')

@section('main-content')
<!-- start of product section -->
<div class="container-fluid">
<div class="row row-cols-1 row-cols-md-4 g-4">
  @foreach($products as $p)
  <div class="col">
    <div class="card">
      <img src="{{asset('uploads')}}/{{$p->product_image}}" class="card-img-top" alt="{{$p->product_name}}">
      <div class="card-body">
        <h5 class="card-title">{{$p->product_name}}</h5>
        <h5>Rs {{$p->product_price}}</h5>
        <a href="{{route('productdetails',$p->id)}}" class="btn btn-success">View Details</a>
      </div>
    </div>
  </div>
  @endforeach
</div>
</div>

<!-- end of product section -->
@endsection