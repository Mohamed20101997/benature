<?php

namespace App\Http\Requests;

use App\Rules\UniqueMaterialName;
use Illuminate\Foundation\Http\FormRequest;

class MaterialRequest extends FormRequest
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
            'en.name' => ['required', new UniqueMaterialName($this ->name,$this -> id)],
            'ar.name' => ['required', new UniqueMaterialName($this ->name,$this -> id)],
        ];
    }
}
