<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Item extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'item_name',
        'text',
        'pref',
        'city'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }

    public function getItem(Int $item_id)
    {
        return $this->with('user')->where('id',$item_id)->first();
    }

    public function itemStore(Int $user_id, Array $data)
    {
        //$file_name = $data['item_image']->store('public/item_image/');
        $this->user_id = $user_id;
        $this->item_name = $data['item_name'];
        $this->text = $data['text'];
        $this->pref = $data['pref'];
        $this->city = $data['city'];
        $this->item_image = base64_encode(file_get_contents($data['item_image']));
        //$this->item_image = basename($file_name);
        $this->save();

        return;
    }

    public function deleteItem(Int $item_id, Int $user_id)
    {
        return $this->where('id',$item_id)->where('user_id',$user_id)->delete();
    }


}
