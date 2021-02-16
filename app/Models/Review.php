<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ['name','comment','rating','product_id','date'];
    protected $date = [
        'date',
    ];
    public function products(){

        return $this->belongsTo(Product::class , 'product_id');
    }


    public function getCreatedAtAttribute($date)
{
    return Carbon::createFromFormat('Y-m-d H:i:s', $date)->translatedFormat('F d Y');
}






}
