@extends('users.master')
@section('title','Order Items')

@section('main-content')
<!-- start of cart section -->
<div class="container-fluid my-5">
<div class="row d-flex justify-content-center">
    <div class="col-md-10">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Unit price</th>
                    <th>Total Amount</th>
                    <th>Status</th>
                    <th>Payment Status</th>   
                </tr>
            </thead>
            <tbody>
                @foreach($orderItems as $order)
                <tr>
                    <td><img src="{{asset('uploads')}}/{{$order->products->product_image}}" alt="{{$order->products->product_name}}" width="60"></td>
                    <td>{{$order->products->product_name}}</td>
                    <td>{{$order->quantity}}</td>
                    <td>Rs {{$order->products->product_price}}</td>
                    <td>Rs {{$order->total_amount}}</td>
                    <td>{{$order->status}}</td>
                    <td>{{$order->payment_status}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>

<!-- end of product section -->
@endsection