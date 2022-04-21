@extends('frontend.master')
@section('title')
    razorpay
@endsection

@section('body')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3>Razor Payment</h3>
            <form action="{{route('razor.payment')}}" method="post">
                @csrf
                <script
                src="https://checkout.razorpay.com/v1/checkout.js"
                data-key="{{env('RAZOR_KEY')}}"
                data-amount="{{($order->total_amount)*100}}"
                data-buttontext="Pay {{$order->total_amount}} USD"
                data-description="Payment"
                data-prefill.name="{{$order->full_name}}"
                data-prefill.email="{{$order->email}}"
                data-theme.color="#ff7529"
                ></script>
            </form>
        </div>
    </div>
</div>

@endsection
