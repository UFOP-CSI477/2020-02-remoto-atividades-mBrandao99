<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VacinaStoreRequest extends FormRequest
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
            'nome' => ['required', 'string', 'unique:vacinas,nome', 'max:100'],
            'fabricante' => ['required', 'string', 'max:100'],
            'doses' => ['required', 'int', 'between:1,3'],
        ];
    }
}
