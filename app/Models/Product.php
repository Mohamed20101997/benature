<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use Translatable,
        SoftDeletes;

        protected $with = ['translations'];
        protected $translatedAttributes  = ['name', 'description'];
        protected $fillable = [
            'photo',
            'price',
            'special_price',
            'special_price_start',
            'special_price_end',
            'code',
            'type',
            'matrial',
            'manage_stock',
            'qty',
            'slug',
            'in_stock',
            'weight',
            'length',
            'width',
            'height',
            'is_active',
            'brand_id',
        ];

        protected $casts = [
            'manage_stock' => 'boolean',
            'in_stock' => 'boolean',
            'is_active' => 'boolean',
        ];


        protected $date = [
            'special_price_start',
            'special_price_end',
            'start_date',
            'end_date',
            'deleted_at',
        ];


        /////////////////////// functions  ////////////////
        public function getActive()
        {
            return $this->is_active == 1 ? 'مفعل' : 'غير مفعل' ;
        }

        //////////// relations //////////////////////

        public function brand(){
            return $this->belongsTo(Brand::class)->withDefault();
        }

        public function categories(){

            return $this->belongsToMany(Category::class , 'product_categories');
        }


        //////////// scope //////////////////////

        public function scopeActive($q){

            return $q->where('is_active', 1);
        }

}
