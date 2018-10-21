@extends('layouts.app')

@section('title', 'Create Order Item')

@section('content')
    <h1>Create Order Item</h1>

    {{--{!! HTML::ul($errors->all()) !!}--}}
    {{ Form::open(array('url' => 'order-items')) }}
    <div>
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name') }}
    </div>

    <div>
        {{ Form::label('sku', 'SKU') }}
        {{ Form::text('sku') }}
    </div>

    <div>
        {{ Form::label('price', 'Price') }}
        {{ Form::text('price') }}
    </div>

    <div>
        {{ Form::label('quantity', 'Quantity') }}
        {{ Form::text('quantity') }}
    </div>

    <div>
        {{--{{ Form::label('order', 'Order') }}--}}
        {{--{{ Form::select('order', [null => 'Select order'] + $orderIds) }}--}}

        <label for="order">Order</label>
        <select name="order" id="order">
            <option value="">Select order</option>
            @foreach ($orderIds as $key => $value)
                <option value="{{ $value }}">{{ $value }}</option>
            @endforeach
        </select>
    </div>

    {{ Form::submit('Create order') }}
    {{ Form::close() }}

    <br>
    <a href="{{ route('order_item_index') }}">Order Item list</a>
@endsection