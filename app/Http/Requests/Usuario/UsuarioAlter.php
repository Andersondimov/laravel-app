<?php

namespace App\Http\Requests\Usuario;

use Illuminate\Foundation\Http\FormRequest;

class UsuarioAlter extends FormRequest
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
            'UsuarioNome' => 'required|',
            'UsuarioStatus' => 'required|',
            'UsuarioLogin' => 'required|',
            'PerfilID' => 'required|'
        ];
    }

    public function messages()
    {
        return [
            'UsuarioNome.required' => 'O campo Nome do Usuário é obrigatório',
            'UsuarioStatus.required' => 'O campo Status é obrigatório',
            'UsuarioLogin.required' => 'O campo Login é obrigatório',
            'PerfilID.required' => 'O campo Perfil é obrigatório'
            
        ];
    }

}
