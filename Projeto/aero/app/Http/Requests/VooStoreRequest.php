<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use NumberFormatter;

class VooStoreRequest extends FormRequest
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
            'aeroporto_saida_id' => ['required', 'int', 'exists:aeroportos,id', 'different:aeroporto_chegada_id'],
            'aeroporto_chegada_id'=> ['required', 'int', 'exists:aeroportos,id', 'different:aeroporto_saida_id'],
            'empresa_id' => ['required', 'int', 'exists:empresas,id'],
            'saida' => ['required', 'date_format:d/m/Y H:i', 'before_or_equal:chegada'],
            'chegada' => ['required', 'date_format:d/m/Y H:i', 'after_or_equal:saida'],
            'primeira' => ['required', 'numeric', 'gt:executiva'],
            'executiva' => ['required', 'numeric', 'gt:economica'],
            'economica' => ['required', 'numeric', 'gt:0'],
        ];
        //'regex:/^(?:d*.d{1,2}|d+)$/'
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            //
        ];
    }
}
