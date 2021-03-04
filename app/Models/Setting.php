<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = ['facebook','gmail','whatsapp','image1','image2','image3','image4','label1','label2','label3','label4','header','title','description'];
}
