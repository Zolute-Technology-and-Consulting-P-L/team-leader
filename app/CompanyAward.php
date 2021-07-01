<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyAward extends Model
{
    protected $table = 'assign_awards';

    public function company(){
       return $this->belongsTo('App\Company','company_id');
    }

    public function award(){
        return $this->belongsTo('App\Award','award_id');
    }
}
