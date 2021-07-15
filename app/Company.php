<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    function entity(){
        return $this->belongsTo('App\Entity','entity_id');
    }
}
