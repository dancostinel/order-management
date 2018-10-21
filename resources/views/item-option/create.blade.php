@extends('layouts.app')

@section('title', 'Create Item Option')

@section('content')
    <h1>Create Item Option</h1>

    {{--{!! HTML::ul($errors->all()) !!}--}}
    {{ Form::open(array('url' => 'item-options')) }}
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
                <option value="{{ $value }}">{{ $value }}</option>
            @endforeach
        </select>
    </div>

    {{ Form::submit('Create item option') }}
    {{ Form::close() }}

    <br>
    <a href="{{ route('item_option_index') }}">Item option list</a>
@endsection