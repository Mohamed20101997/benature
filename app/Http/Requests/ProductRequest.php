<?php

namespace App\Http\Requests;

use App\Rules\ProductQty;
use App\Rules\UniqueProductName;
use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * @var mixed
     */


    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'photo' => 'required|image|mimes:jpg,jpeg,png',
            'en.name' => ['required', new UniqueProductName($this ->name,$this -> id)],
            'ar.name' => ['required', new UniqueProductName($this ->name,$this -> id)],
            'en.description' => 'required',
            'ar.description' => 'required',
            'category_id' => 'required|numeric|exists:categories,id',
            'brand_id' => 'required|numeric|exists:brands,id',
            'country_id' => 'required|numeric|exists:countries,id',
            'material_id' => 'required|numeric|exists:materials,id',
            'price' => 'required|min:0|numeric',
            'special_price_type' => 'nullable|in:0,1',
            'special_price' => 'required_if:special_price_type,==,1|nullable|numeric',
            'special_price_start' => 'required_if:special_price_type,==,1|nullable|date_format:Y-m-d',
            'special_price_end' => 'required_if:special_price_type,==,1|nullable|date_format:Y-m-d',
            'code' => 'nullable|min:3|max:10',
            'in_stock' => 'required|in:0,1',
            'qty' => 'required_if:in_stock,==,1',
            'weight' => 'required|nullable|numeric',
            'length'=> 'required|nullable|numeric',
            'filter'=> 'required|required|in:men,women',
            'width'=> 'required|nullable|numeric',
            'height'=> 'required|nullable|numeric',

        ];
    }
}
