@extends('layouts.app')

@section('title', 'Edit Order')

@section('content')
    <h1>Edit Order</h1>

    {{ Form::model($order, ['route' => ['order_update', $order->id], 'method' => 'PUT']) }}
    <div>
        {{ Form::label('customer_name', 'Customer Name') }}
        {{ Form::text('customer_name') }}
    </div>

    <div>
        {{ Form::label('customer_email', 'Customer Email') }}
        {{ Form::email('customer_email') }}
    </div>

    <div>
        {{ Form::label('billing_address', 'Billing Address') }}
        {{ Form::text('billing_address') }}
    </div>

    <div>
        {{ Form::label('shipping_address', 'Shipping Address') }}
        {{ Form::text('shipping_address') }}
    </div>

    <div>
        {{ Form::label('total', 'Total') }}
        {{ Form::number('total') }}
    </div>

    {{ Form::submit('Edit order') }}
    {{ Form::close() }}

    <br>
    <a href="{{ route('order_index') }}">Order list</a>
    <a href="{{ route('order_create') }}">Create order</a>
@endsection