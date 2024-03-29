<?php

namespace App\Http\Requests\Evento;

use Illuminate\Foundation\Http\FormRequest;

class EventoCreate extends FormRequest
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
            'Evento' => 'required|',
            'EventoCod' => 'required|'
        ];
    }

    public function messages()
    {
        return [
            'Evento.required' => 'O campo Nome da Evento é obrigatório',
            'EventoCod.required' => 'O campo Cod. Evento é obrigatório'
        ];
    }

}
