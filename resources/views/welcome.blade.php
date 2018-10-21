<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Home</title>
    </head>
    <body>
        <a href="{{ route('order_index') }}">Order</a> <br>
        <a href="{{ route('order_item_index') }}">Order Item</a> <br>
        <a href="{{ route('item_option_index') }}">Item Option</a>
    </body>
</html>
