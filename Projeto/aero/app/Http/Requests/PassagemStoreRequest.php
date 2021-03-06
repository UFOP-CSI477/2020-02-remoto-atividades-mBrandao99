<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PassagemStoreRequest extends FormRequest
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
            'classe' => ['required', 'int', 'between:1,3'],
            'voo_id' => ['required', 'int', 'exists:voos,id'],
        ];
    }
}
