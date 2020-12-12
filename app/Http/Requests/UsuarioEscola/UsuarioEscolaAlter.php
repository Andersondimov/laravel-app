<?php

namespace App\Http\Requests\UsuarioEscola;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioEscolaAlter extends FormRequest
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

            'UsuarioEscola' => 'required|',
            'UsuarioEscolaStatus' => 'required|',
            'EscolaID' => 'required|',
            'UsuarioID' => 'required|'

        ];
    }

    public function messages()
    {
        return [

            'UsuarioEscola.required' => 'O campo UsuarioEscola é obrigatório',
            'UsuarioEscolaStatus.required' => 'O campo UsuarioEscolaStatus é obrigatório',
            'EscolaID.required' => 'O campo EscolaID é obrigatório',
            'UsuarioID' => 'O campo UsuarioID é obrigatótio'
            
        ];
    }

}
