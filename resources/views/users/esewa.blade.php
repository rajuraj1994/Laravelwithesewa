@extends('users.master')
@section('title','Esewa Payment')

@section('main-content')
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h1 class="text-center">You are being redirect to Esewa. Please wait.....</h1>
            <div class="card p-2" style="display:none">
                <form action="https://uat.esewa.com.np/epay/main" method="POST" id="esewa_form">
                    <input value="{{$order->total_amount}}" name="tAmt" type="text" readonly>
                    <input value="{{$order->total_amount}}" name="amt" type="text" readonly>
                    <input value="0" name="txAmt" type="text" readonly>
                    <input value="0" name="psc" type="text" readonly>
                    <input value="0" name="pdc" type="text" readonly>
                    <input value="EPAYTEST" name="scd" type="hidden">
                    <input value="{{$order->id}}_{{$cart->id}}" name="pid" type="hidden">
                    <input value="http://127.0.0.1:8000/esewaverify" type="hidden" name="su">
                    <input value="{{ request()->url() }}" type="hidden" name="fu">
                    <input value="Submit" type="submit">
                </form>

            </div>
        </div>
    </div>
</div>

<script>
    setTimeout(function(){
        document.getElementById('esewa_form').submit()
    },1000)
</script>

@endsection