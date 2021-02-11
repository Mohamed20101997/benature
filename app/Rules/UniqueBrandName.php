<?php

namespace App\Rules;

use App\Models\BrandTranslation;
use Illuminate\Contracts\Validation\Rule;

class UniqueBrandName implements Rule
{

    private $name;
    private $id;

    public function __construct($name , $id)
    {
        $this->name = $name;
        $this->id = $id;
    }


    public function passes($attribute, $value)
    {
        if($this -> id) //edit form
            $product = BrandTranslation::where('name', $value)->where('brand_id','!=',$this->id) -> first();
        else  //creation form
            $product = BrandTranslation::where('name', $value)->first();

        if ($product)
            return false;
        else
            return true;
    }


    public function message()
    {
        return 'this name already exists  before.';
    }
}
