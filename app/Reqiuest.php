<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reqiuest extends model
{

    public function user()
    {
        return $this->belongTo('App\User', 'id');
    }

    public function st_id()
    {
        return $this->hasOne('App\User', 'id', 'st_id');
    }

}