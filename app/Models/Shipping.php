<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{

    protected $fillable = ['country_id' ,'city_id' ,'price'];



    ///////////// relation //////

    public  function city(){
        return $this->belongsTo(City::class , 'city_id' );
    }

    public  function country(){
        return $this->belongsTo(Country::class , 'country_id' ) ;
    }
}
