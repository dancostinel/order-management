<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderItem;
use Validator;
use Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class OrderItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $orderItems = OrderItem::all();

        return view('order-item.index')->with('orderItems', $orderItems);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        /** @var array $orderIds */
        $orderIds = Order::where('id', '>', 0)->pluck('id')->toArray();

        return view('order-item.create')->with('orderIds', $orderIds);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        /** @var array $rules */
        $rules = [
            'name' => 'required',
            'sku' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'order' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return Redirect::to('order-items/create')
                ->withErrors($validator)
                ->withInput()
            ;
        } else {
            $orderItem = new OrderItem;
            $orderItem->name = Input::get('name');
            $orderItem->sku = Input::get('sku');
            $orderItem->price = Input::get('price');
            $orderItem->quantity = Input::get('quantity');
            $orderItem->order_id = Input::get('order');

            $orderItem->save();

            return Redirect::to('order-items');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        $orderItem = OrderItem::findOrFail($id);

        return view('order-item.show')->with('orderItem', $orderItem);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $orderItem = OrderItem::findOrFail($id);

        /** @var array $orderIds */
        $orderIds = Order::where('id', '>', 0)->pluck('id')->toArray();

        return view('order-item.edit')->with(['orderItem' => $orderItem, 'orderIds' => $orderIds]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
        /** @var array $rules */
        $rules = [
            'name' => 'required',
            'sku' => 'required',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'order' => 'required'
        ];

        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Redirect::to('order-items/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput()
            ;
        } else {
            $orderItem = OrderItem::findOrFail($id);
            $orderItem->name = Input::get('name');
            $orderItem->sku = Input::get('sku');
            $orderItem->price = Input::get('price');
            $orderItem->quantity = Input::get('quantity');
            $orderItem->order_id = Input::get('order');
            $orderItem->save();

            return Redirect::to('order-items');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        $orderItem = OrderItem::findOrFail($id);
        $orderItem->delete();

        return Redirect::to('order-items');
    }
}
