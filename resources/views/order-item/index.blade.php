@extends('layouts.app')

@section('title', 'Order Item List')
@section('styles')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endsection

@section('content')
    <h1>Order Items List</h1>
    <a href="{{ route('order_item_create') }}">Create</a> <br>
    <a href="{{ URL::to('/') }}">Home</a> <br><br>

    <table border="1" width="100%">
        <thead>
        <tr>
            <th>Name</th>
            <th>SKU</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Order</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($orderItems as $key => $value)
            <tr>
                <td>{{ $value->name }}</td>
                <td>{{ $value->sku }}</td>
                <td>{{ $value->price }}</td>
                <td>{{ $value->quantity }}</td>
                <td>{{ $value->order_id }}</td>
                <td>
                    {{ Form::open(['url' => 'order-items/' . $value->id . '/delete']) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Delete') }}
                    {{ Form::close() }}

                    <a href="{{ URL::to('order-items/' . $value->id) }}">show</a>
                    <a href="{{ URL::to('order-items/' . $value->id . '/edit') }}">edit</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection