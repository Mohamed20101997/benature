<?php

namespace App\Http\Requests;

use App\Rules\UniqueBrandName;
use Illuminate\Foundation\Http\FormRequest;

class BrandRequest extends FormRequest
{
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
            'photo' => 'nullable|image|mimes:jpg,jpeg,png',
            'en.name' => ['required', new UniqueBrandName($this ->name,$this -> id)],
            'ar.name' => ['required', new UniqueBrandName($this ->name,$this -> id)],
        ];
    }
}
