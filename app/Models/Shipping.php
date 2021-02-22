<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    use Translatable;
    protected $with = ['translations'];
    protected $translatedAttributes = ['name'];
    protected $fillable = ['country_id' ,'city_id'];
    protected $hidden = ['translations'];


    ///////////// relation //////

    public  function city(){
        return $this->belongsTo(City::class , 'city_id' );
    }

    public  function country(){
        return $this->belongsTo(Country::class , 'country_id' ) ;
    }
}
