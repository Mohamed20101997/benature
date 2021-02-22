<?php

namespace App\Http\Requests;

use App\Rules\UniqueMaterialName;
use Illuminate\Foundation\Http\FormRequest;

class CityRequest extends FormRequest
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
            'en.name' => 'required|sometimes',
            'ar.name' => 'required|sometimes',
            'country_id' => 'required|numeric|exists:countries,id',
        ];
    }
}
