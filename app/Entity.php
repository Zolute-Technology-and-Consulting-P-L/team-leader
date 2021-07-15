<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entity extends Model
{
    protected $table = 'entity';

    function companies(){
        return $this->hasMany('App\Company','entity_id');
    }

    function awards(){
        return $this->hasMany('App\Award','award_id');
    }
}
