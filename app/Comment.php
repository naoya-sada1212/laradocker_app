<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use SoftDeletes;

    protected $fillable = ['text'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function commentStore(Int $user_id,Array $data)
    {
        $this->user_id = $data['user_id'];
        $this->item_id = $data['item_id'];
        $this->text = $data['text'];
        $this->save();

        return;
    }
}
