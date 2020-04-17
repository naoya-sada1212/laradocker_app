<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Item;
use App\User;
use App\Comment;

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
    public function show(Item $item, Comment $comment)
    {
        $user = auth()->user();
        $item = $item->getItem($item->id);
        $comments = $comment->getComment($item->id);
        
        return view('items.show',['item' => $item,'user'=>$user,'comments'=> $comments]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        $user = auth()->user();
        return view('items.edit',['item' => $item,'user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        $user = auth()->user();
        $item->deleteItem($item->id,$user->id);

        return back();
    }

    public function keyword(Request $request, Item $item)
    {
        $keyword = $request->keyword;
        //dd($keyword);
        if($keyword != '')
        {
            $items = $item
            ->where('pref','like',$keyword)
            ->orwhere('city','like',$keyword)
            ->paginate(6);
        } else {
            return back();
        }
        //dd($items);


        return view('items.keyword',['keyword' =>  $keyword,'items' => $items]);
    }
}
