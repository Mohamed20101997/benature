<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'          => 'required|max:100',
            'comment'       => 'required',
            'product_id'    => 'required|numeric|exists:products,id',
            'rating'        => 'nullable',
        ];
    }
}
