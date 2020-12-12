<?php

namespace App\Http\Requests\PerfilTela;

use Illuminate\Foundation\Http\FormRequest;

class PerfilTelaCreate extends FormRequest
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

            'PerfilTelaStatus' => 'required|'
        ];
    }

    public function messages()
    {
        return [

            'PerfilTelaStatus.required' => 'O campo PerfilTelaStatus é obrigatório'
        ];
    }

}
