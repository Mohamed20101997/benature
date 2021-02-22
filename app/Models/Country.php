<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{

    use Translatable;
    protected $with = ['translations'];
    protected $translatedAttributes = ['name'];
    protected $hidden = ['translations'];


    ///////////// relation //////

     public  function cities(){
         return $this->belongsToMany(City::class , 'country_id' );
     }

    public  function countries(){
        return $this->belongsToMany(Country::class , 'country_id' ) ;
    }
}
