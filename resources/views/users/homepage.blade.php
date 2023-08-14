@extends('users.master')
@section('title','Ecommerce')

@section('main-content')
<!-- start of carousel section -->
<div id="carouselExampleIndicators" class="carousel slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="{{asset('images/cp1.jpg')}}" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="{{asset('images/cp4.jpg')}}" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="{{asset('images/d.jpg')}}" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<!-- end of carousel section -->
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