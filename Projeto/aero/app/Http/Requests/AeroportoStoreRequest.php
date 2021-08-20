<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AeroportoStoreRequest extends FormRequest
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
            'nome' => ['required', 'string', 'max:100'],
            'cidade_id' => ['required', 'int', 'between:0,5569'],
        ];
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'cidade_id.between' => 'Cidade inválida!',
        ];
    }
}
