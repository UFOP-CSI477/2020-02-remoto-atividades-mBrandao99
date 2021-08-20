<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmpresaStoreRequest extends FormRequest
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
            'cnpj' => ['required', 'string', 'unique:empresas,cnpj', 'size:18'],
        ];
    }

         /**
     * Custom message for validation
     *
     * @return array
     */
    // public function messages()
    // {
    //     return [
    //         'nome.required' => 'Informe um nome para a empresa!',
    //         'nome.max' => 'O nome não deve ser maior do que 100 caracteres!',
    //         'cnpj.required' => 'Informe um CNPJ para a empresa!',
    //         'cnpj.unique' => 'CNPJ já cadastrado!',
    //         'cnpj.size' => 'CNPJ inválido!',
    //     ];
    // }
}
