<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tax extends Model
{

    protected $fillable = ['country_id' ,'tax'];

    ///////////// relation //////

    public  function country(){
        return $this->belongsTo(Country::class , 'country_id' ) ;
    }
}
