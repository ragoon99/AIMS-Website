<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserAuth extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'id' => ['required', 'integer', 'min:7'],
            'passphrase' => ['required', 'min:5'],
        ];
    }

    public function prepareForValidation(){
        $this->merge([
            'id' => strip_tags($this['id']),
            'passphrase' => strip_tags($this->passphrase),
        ]);
    }
}
