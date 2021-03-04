<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{

    use Translatable;
    protected $with = ['translations'];
    protected $translatedAttributes = ['name'];
    protected $fillable = ['currency'] ;
    protected $hidden = ['translations'];


    ///////////// relation //////

     public  function cities(){
         return $this->hasMany(City::class , 'country_id' );
     }

    public  function countries(){
        return $this->hasMany(Country::class , 'country_id' ) ;
    }

    public  function products(){
        return $this->hasMany(Product::class , 'country_id' ) ;
    }


    public function taxes(){
        return $this->hasMany(Tax::class, 'country_id');
    }


    // set Attribute
    public function setCurrencyAttribute($value){
        $this->attributes['currency'] = strtoupper($value);;
    }


}
