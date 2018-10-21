@extends('layouts.app')

@section('title', 'Orders List')
@section('styles')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endsection

@section('content')
    <h1>Orders List</h1>
    <a href="{{ route('order_create') }}">Create</a> <br>
    <a href="{{ URL::to('/') }}">Home</a> <br><br>

    <table border="1" width="100%">
        <thead>
        <tr>
            <th>Customer Name</th>
            <th>Customer Email</th>
            <th>Billing Address</th>
            <th>Shipping Address</th>
            <th>Total</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($orders as $key => $value)
            <tr>
                <td>{{ $value->customer_name }}</td>
                <td>{{ $value->customer_email }}</td>
                <td>{{ $value->billing_address }}</td>
                <td>{{ $value->shipping_address }}</td>
                <td>{{ $value->total }}</td>
                <td>
                    {{ Form::open(['url' => 'orders/' . $value->id . '/delete']) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Delete') }}
                    {{ Form::close() }}

                    <a href="{{ URL::to('orders/' . $value->id) }}">show</a>
                    <a href="{{ URL::to('orders/' . $value->id . '/edit') }}">edit</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection