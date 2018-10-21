@extends('layouts.app')

@section('title', 'Edit Order Item')

@section('content')
    <h1>Edit Order Item</h1>

    {{ Form::model($orderItem, ['route' => ['order_item_update', $orderItem->id], 'method' => 'PUT']) }}
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
        {{ Form::number('price') }}
    </div>

    <div>
        {{ Form::label('quantity', 'Quantity') }}
        {{ Form::number('quantity') }}
    </div>

    <div>
        <label for="order">Order</label>
        <select name="order" id="order">
            <option value="">Select order</option>
            @foreach ($orderIds as $key => $value)
                <option value="{{ $value }}" @if ($value == $orderItem->order_id) selected="selected" @endif>{{ $value }}</option>
            @endforeach
        </select>
    </div>

    {{ Form::submit('Edit order item') }}
    {{ Form::close() }}

    <br>
    <a href="{{ route('order_item_index') }}">Order Item list</a>
    <a href="{{ route('order_item_create') }}">Create order item</a>
@endsection