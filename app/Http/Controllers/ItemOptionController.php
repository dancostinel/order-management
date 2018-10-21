<?php

namespace App\Http\Controllers;

use App\OrderItem;
use App\ItemOption;
use Validator;
use Redirect;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ItemOptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $itemOptions = ItemOption::all();

        return view('item-option.index')->with('itemOptions', $itemOptions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        /** @var array $orderItemIds */
        $orderItemIds = OrderItem::where('id', '>', 0)->pluck('id')->toArray();

        return view('item-option.create')->with('orderItemIds', $orderItemIds);
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
            'value' => 'required',
            'id' => 'required'
        ];

        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return Redirect::to('item-options/create')
                ->withErrors($validator)
                ->withInput()
            ;
        } else {
            $itemOption = new ItemOption;
            $itemOption->name = Input::get('name');
            $itemOption->value = Input::get('value');
            $itemOption->order_items_id = Input::get('id');

            $itemOption->save();

            return Redirect::to('item-options');
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
        $itemOption = ItemOption::findOrFail($id);

        return view('item-option.show')->with('itemOption', $itemOption);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        $itemOption = ItemOption::findOrFail($id);

        /** @var array $orderItemIds */
        $orderItemIds = OrderItem::where('id', '>', 0)->pluck('id')->toArray();

        return view('item-option.edit')->with(['itemOption' => $itemOption, 'orderItemIds' => $orderItemIds]);
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
            'value' => 'required',
            'id' => 'required'
        ];

        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()) {
            return Redirect::to('item-options/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput()
            ;
        } else {
            $itemOption = ItemOption::findOrFail($id);
            $itemOption->name = Input::get('name');
            $itemOption->value = Input::get('value');
            $itemOption->order_items_id = Input::get('id');
            $itemOption->save();

            return Redirect::to('item-options');
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
        $itemOption = ItemOption::findOrFail($id);
        $itemOption->delete();

        return Redirect::to('item-options');
    }
}
