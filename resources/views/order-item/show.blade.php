@extends('layouts.app')

@section('title', 'Order Item Show')

@section('content')
    <h1>Order Item Show</h1>
    Name: {{ $orderItem->name }} <br>
    SKU: {{ $orderItem->sku }} <br>
    Price: {{ $orderItem->price }} <br>
    Quantity: {{ $orderItem->quantity }} <br>
    Order: {{ $orderItem->order_id }} <br>

    <a href="{{ route('order_item_index') }}">Order Item</a>
    <a href="{{ route('order_item_create') }}">Create order item</a>
@endsection