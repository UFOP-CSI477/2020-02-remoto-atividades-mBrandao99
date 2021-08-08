<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EquipamentoStoreRequest extends FormRequest
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
            'nome' => ['required', 'string', 'max:50'],
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
            'nome.required' => 'Informe um nome para o equipamento!',
            'nome.max' => 'O nome não deve ser maior do que 50 caracteres!',
        ];
    }
}
