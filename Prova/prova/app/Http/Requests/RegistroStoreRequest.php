<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistroStoreRequest extends FormRequest
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
            'pessoa_id' => ['required', 'int', 'exists:pessoas,id'],
            'unidade_id' => ['required', 'int', 'exists:unidades,id'],
            'vacina_id' => ['required', 'int', 'exists:vacinas,id'],
            'data' => ['required', 'date_format:d/m/Y', 'before:tomorrow'],
            'dose' => ['required', 'int', 'between:0,3'],
        ];
    }
}
