<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','account_name','image',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function item()
    {
        return $this->hasMany(Item::class);
    }

    public function comment()
    {
        return $this->hasMany(Comment::class);
    }

    public function userUpdate( Array $data)
    {
        if(isset($data['user_image'])) {
            //$file_name = $data['image']->store('public/image/');
            $user_image = base64_encode(file_get_contents($data['user_image']));
            $this::where('id',$this->id)
            ->update([          
                'name' => $data['name'],
                'account_name' => $data['account_name'],
                'user_image' => $user_image,
                //'image' => basename($file_name)
            ]);
        } else {
            //$file_name = $data['image']->store('public/image/8.png');
            //$data['image'] = '8.png';
            $this::where('id',$this->id)
            ->update([
                //'image' => basename($file_name),
                'name' => $data['name'],
                'account_name' => $data['account_name'],
            ]);
        }

        return;
    }
}
