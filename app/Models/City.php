<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use Translatable;
    protected $with = ['translations'];
    protected $translatedAttributes = ['name'];
    protected $fillable = ['country_id'];
    protected $hidden = ['translations'];

    ///////////////   relations ////////////

    public  function country(){
        return $this->belongsTo(Country::class , 'country_id' ) ;
    }

    public  function cities(){
        return $this->belongsToMany(City::class , 'city_id' );
    }

}
