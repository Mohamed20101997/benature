<?php

namespace App\Http\Requests;

use App\Rules\ProductQty;
use App\Rules\UniqueProductName;
use Illuminate\Foundation\Http\FormRequest;

class ProductUpdateRequest extends FormRequest
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
            'en.name' => ['required', new UniqueProductName($this ->name,$this -> id)],
            'ar.name' => ['required', new UniqueProductName($this ->name,$this -> id)],
            'en.description' => 'required',
            'ar.description' => 'required',
            'category_id' => 'required|numeric|exists:categories,id',
            'brand_id' => 'required|numeric|exists:brands,id',
            'material_id' => 'required|numeric|exists:materials,id',
            'price' => 'required|min:0|numeric',
            'special_price_type' => 'nullable|in:0,1',
            'special_price' => 'required_if:special_price_type,==,1|nullable|numeric',
            'special_price_start' => 'required_if:special_price_type,==,1|nullable|date_format:Y-m-d',
            'special_price_end' => 'required_if:special_price_type,==,1|nullable|date_format:Y-m-d',
            'code' => 'nullable|min:3|max:10',
            'in_stock' => 'required|in:0,1',
            'qty' => 'required_if:in_stock,==,1',
            'filter'=> 'required|in:men,women',
            'weight' => 'nullable|numeric',
            'length'=> 'nullable|numeric',
            'width'=> 'nullable|numeric',
            'height'=> 'nullable|numeric',

        ];
    }
}
