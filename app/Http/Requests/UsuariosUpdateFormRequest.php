<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuariosUpdateFormRequest extends FormRequest
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
            //'fechaFinal' => 'required|after_or_equal:fechaInicial',
            //'fecha_evento'=>'unique:usuarios',
            'telefono' => 'min:7',
            'numero_documento' => 'min:4',
            'nombre_usuario' => 'min:3',
            'apellido_usuario' => 'min:3',
            'contrasena' => 'min:8',
        ];
    }
}
