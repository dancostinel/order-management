@extends('layouts.app')

@section('title', 'Edit Item Option')

@section('content')
    <h1>Edit Item Option</h1>

    {{ Form::model($itemOption, ['route' => ['item_option_update', $itemOption->id], 'method' => 'PUT']) }}
    <div>
        {{ Form::label('name', 'Name') }}
        {{ Form::text('name') }}
    </div>

    <div>
        {{ Form::label('value', 'Value') }}
        {{ Form::text('value') }}
    </div>

    <div>
        <label for="id">Order Item</label>
        <select name="id" id="id">
            <option value="">Select order item</option>
            @foreach ($orderItemIds as $key => $value)
                <option value="{{ $value }}" @if ($value == $itemOption->order_items_id) selected="selected" @endif>{{ $value }}</option>
            @endforeach
        </select>
    </div>

    {{ Form::submit('Edit item option') }}
    {{ Form::close() }}

    <br>
    <a href="{{ route('item_option_index') }}">Item option list</a>
    <a href="{{ route('item_option_create') }}">Create item option</a>
@endsection