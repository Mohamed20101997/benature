<?php

namespace App\Http\Requests;

use App\Rules\TransRule;
use App\Rules\UniqueAttributeName;
use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'en.name' => ['required', new UniqueAttributeName($this ->name,$this -> id)],
            'ar.name' => ['required', new UniqueAttributeName($this ->name,$this -> id)],
            'type' => 'required|in:1,2',
            'parent_id' => 'nullable|exists:categories,id',
        ];
    }
}
