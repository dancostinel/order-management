<?php

namespace App\Http\Controllers;

use App\Order;
use Validator;
use Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $orders = Order::all();

        return view('orders.index')->with('orders', $orders);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return \View::make('orders.create');
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
            'customer_name' => 'required',
            'customer_email' => 'required|email',
            'billing_address' => 'required',
            'shipping_address' => 'required',
            'total' => 'required|numeric',
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return Redirect::to('orders/create')
                ->withErrors($validator)
                ->withInput()
            ;
        } else {
            $order = new Order;
            $order->customer_name = Input::get('customer_name');
            $order->customer_email = Input::get('customer_email');
            $order->billing_address = Input::get('billing_address');
            $order->shipping_address = Input::get('shipping_address');
            $order->total = Input::get('total');
            $order->save();

            return Redirect::to('orders');
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
        $order = Order::findOrFail($id);

        return \View::make('orders.show')->with('order', $order);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $order = Order::findOrFail($id);

        return \View::make('orders.edit')->with('order', $order);
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
            'customer_name' => 'required',
            'customer_email' => 'required|email',
            'billing_address' => 'required',
            'shipping_address' => 'required',
            'total' => 'required|numeric',
        ];

        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Redirect::to('orders/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput()
            ;
        } else {
            $order = Order::findOrFail($id);
            $order->customer_name = Input::get('customer_name');
            $order->customer_email = Input::get('customer_email');
            $order->billing_address = Input::get('billing_address');
            $order->shipping_address = Input::get('shipping_address');
            $order->total = Input::get('total');
            $order->save();

            return Redirect::to('orders');
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
        $order = Order::findOrFail($id);
        $order->delete();

        return Redirect::to('orders');
    }
}
