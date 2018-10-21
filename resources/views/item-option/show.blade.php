@extends('layouts.app')

@section('title', 'Item Options Show')

@section('content')
    <h1>Item Option Show</h1>
    Name: {{ $itemOption->name }} <br>
    Value: {{ $itemOption->value }} <br>
    Order Item: {{ $itemOption->order_items_id }} <br>

    <a href="{{ route('item_option_index') }}">Item Option</a>
    <a href="{{ route('item_option_create') }}">Create item option</a>
@endsection