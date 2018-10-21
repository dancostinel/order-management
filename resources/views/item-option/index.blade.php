@extends('layouts.app')

@section('title', 'Item Options List')
@section('styles')
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
@endsection

@section('content')
    <h1>Item Options List</h1>
    <a href="{{ route('item_option_create') }}">Create</a> <br>
    <a href="{{ URL::to('/') }}">Home</a> <br><br>

    <table border="1" width="100%">
        <thead>
        <tr>
            <th>Name</th>
            <th>Value</th>
            <th>Order Item</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($itemOptions as $key => $value)
            <tr>
                <td>{{ $value->name }}</td>
                <td>{{ $value->value }}</td>
                <td>{{ $value->order_items_id }}</td>
                <td>
                    {{ Form::open(['url' => 'item-options/' . $value->id . '/delete']) }}
                    {{ Form::hidden('_method', 'DELETE') }}
                    {{ Form::submit('Delete') }}
                    {{ Form::close() }}

                    <a href="{{ URL::to('item-options/' . $value->id) }}">show</a>
                    <a href="{{ URL::to('item-options/' . $value->id . '/edit') }}">edit</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection