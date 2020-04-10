<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Item;
use App\User;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Item $item)
    {
        $items = $item->orderBy('created_at','desc')->paginate(6);

        return view('items.index',['items' => $items]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = auth()->user();
        return view('items.create',['user' => $user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Item $item)
    {   
        $user = auth()->user();
        $data = $request->all();
        $validator = Validator::make($data,[
            'item_name' => 'required|string|max:100',
            'text' => 'required|string|max:255',
            'pref' => 'required|string',
            'city' => 'required|string',
            'item_image' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        $validator->validate();
        $item->itemStore($user->id,$data);
        
        return redirect('items');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        $items = $item->where('id',$item->id)->get();
        //dd($items);
        //return view('sample');
        return view('items.show',['items' => $items]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
