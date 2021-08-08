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
            'descricao' => ['required', 'string', 'max:191'],
            'datalimite' => ['required', 'date'],
            'tipo' => ['required', 'integer', 'between:1,3'],
            'equipamento_id' => ['required', 'exists:equipamentos,id'],
            'user_id' => ['required', 'exists:users,id'],
        ];
    }

    public function messages()
    {
        return [
            'descricao.required' => 'Informe uma descricao!',
            'descricao.max' => 'A descrição não deve ser maior do que 191 caracteres!',
            'datalimite.required' => 'Informe uma data!',
            'tipo.required' => 'Selecione um tipo!',
            'tipo.between' => 'Tipo inválido!',
            'equipamento_id.required' => 'Selecione um equipamento!',
            'equipamento_id.exists' => 'Equipamento inválido!',
            'user_id.required' => 'Selecione um usuário!',
            'user_id.exists' => 'Usuário inválido!',
        ];
    }
}
