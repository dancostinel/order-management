@extends('layouts.app')

@section('title', 'Create Order')

@section('content')
    <h1>Create Order</h1>

    {{--{{ HTML::ul($errors->all()) }}--}}
    {{ Form::open(array('url' => 'orders')) }}
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

    {{ Form::submit('Create order') }}
    {{ Form::close() }}

    <br>
    <a href="{{ route('order_index') }}">Order list</a>
@endsection