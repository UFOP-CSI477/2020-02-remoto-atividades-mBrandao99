<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PessoaStoreRequest extends FormRequest
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
        // dd($this);
        return [
            'nome' => ['required', 'string', 'max:100'],
            'cidade' => ['required', 'string', 'max:100'],
            'bairro' => ['required', 'string', 'max:100'],
            'data_nascimento' => ['required', 'date_format:d/m/Y', 'before:tomorrow'],
        ];
    }
}
