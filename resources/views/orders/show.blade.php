@extends('layouts.app')

@section('title', 'Order Show')

@section('content')
    <h1>Order Show</h1>
    Customer Name: {{ $order->customer_name }} <br>
    Customer Email: {{ $order->customer_email }} <br>
    Billing Address: {{ $order->billing_address }} <br>
    Shipping Address: {{ $order->shipping_address }} <br>
    Total: {{ $order->total }} <br>

    <a href="{{ route('order_index') }}">Order</a>
    <a href="{{ route('order_create') }}">Create order</a>
@endsection