<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use Translatable;

    protected $with = ['translations'];

    protected $translatedAttributes = ['name'];
    protected $fillable = ['parent_id','is_active','slug'];

     protected $hidden = ['translations'];

     protected $casts = [
         'is_active' => 'boolean',
     ];

     public function getActive(){
        return $this->is_active == 1 ? 'مفعل' : 'غير مفعل' ;
     }


     ////////////// relations ////////

     public function _parent(){
         return $this->belongsTo(self::class, 'parent_id');
    }


     public function childrens(){
         return $this->hasMany(self::class, 'parent_id');
    }

        ////////////// scope ////////
     public function scopeParent($q){

        return $q->whereNull('parent_id');
     }
     public function scopeChild($q){

        return $q->whereNotNull('parent_id');
     }


    public function scopeActive($q){

        return $q->where('is_active', 1);
    }


    public function products(){

        return $this->hasMany(Product::class , 'category_id');
    }


}
