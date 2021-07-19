<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Award extends Model
{
    protected $table = 'awards';

    function entity(){
        return $this->belongsTo('App\Entity','entity_id');
    }

    function getAwardLogoAttribute($value){
        return url('public/award/logo/').'/'.$value;
    }
}
