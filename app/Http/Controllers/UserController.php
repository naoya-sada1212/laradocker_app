<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Item;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user, Item $item)
    {
        $items = $item->where('user_id',$user->id)->orderBy('created_at','desc')->paginate(6);
        //dd($items);

        return view('users.show',['user' => $user,'items' => $items]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit',['user' => $user]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $data = $request->all();
        if('user_image'== null)
        {
            $data['user_image'] = '8.png';
        }
        $varidator = Validator::make($data,[
            'name' => 'required|string|max:100',
            'account_name' => 'required|max:100',
            'user_image' => 'file|image|mimes:jpeg,png,jpg|max:2048'
        ]);
        $varidator->validate();
        $user->userUpdate($data);
        //dd($user);
        //return view('sample');
        return redirect('users/'.$user->id)->with('user',$user);

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
