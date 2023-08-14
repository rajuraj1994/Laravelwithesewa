@extends('users.master')
@section('title','Cart Items')

@section('main-content')
<!-- start of cart section -->
<div class="container-fluid my-5">
<div class="row d-flex justify-content-center">
    <div class="col-md-5">
       <form action="{{route('postorder',$cart->id)}}" method='post' class="shadow p-3">
        @csrf
        <div class="mb-2">
            <label for="qty">Quantity</label>
            <input type="number" name="quantity" id="qty" class="form-control">
        </div>
        <div class="mb-2">
            <label for="address">Address</label>
            <input type="text" name="address" id="address" class="form-control">
        </div>
        <div class="mb-2">
            <label for="contact">Mobile Number</label>
            <input type="tel" name="contact" id="contact" class="form-control">
        </div>
        <div class="mb-2">
            <label for="pay">Payment Method</label>
            <select name="pay" id="pay" class="form-control">
                <option>Choose</option>
                <option value="cash_on_delivery">Cash on Delivery</option>
                <option value="esewa">Esewa</option>
            </select>
        </div>
        <div class="mb-2">
            <input type="submit" value="Order Now" class="btn btn-warning">
        </div>
       </form>
    </div>
</div>
</div>

<!-- end of product section -->
@endsection