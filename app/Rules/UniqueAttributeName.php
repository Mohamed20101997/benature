<?php

namespace App\Rules;

use App\Models\CategoryTranslation;
use Illuminate\Contracts\Validation\Rule;

class UniqueAttributeName implements Rule
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
            $product = CategoryTranslation::where('name', $value)->where('category_id','!=',$this->id) -> first();
        else  //creation form
            $product = CategoryTranslation::where('name', $value)->first();

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
