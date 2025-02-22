<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class MessageRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'              => 'required|max:100',
            'email'             => 'required|email|max:100',
            'message'           => 'required|max:255',
        ];
    }
}
