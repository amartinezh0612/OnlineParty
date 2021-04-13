<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class UsuariosFormRequest extends FormRequest
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
    public function rules(Request $request)
    { 
        return [
            
            
            'fecha_evento'=>'unique:usuarios',
            'fecha_fin_evento'=>'unique:usuarios',
            function($value){
                if($request->fecha_evento<=$request->fecha_fin_evento)
                {
                    "Verifique las fechas";
                }          
            }

        ];
    }    
}
