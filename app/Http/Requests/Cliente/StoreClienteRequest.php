<?php

namespace App\Http\Requests\Cliente;

use Illuminate\Foundation\Http\FormRequest;

class StoreClienteRequest extends FormRequest
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
            'documento' => 'required|unique:clientes,documento',
            'nombre' => 'required',
            'apellido' => 'required',
            'fecha_nacimiento' => 'required',
            'fecha_ingreso' => 'required',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'documento.required' => 'El Documento de Indentidad no puede quedar vacío',
            'documento.unique' => 'El Documento de Identidad ya existe',
            'nombre.required' => 'El Nombre no puede quedar vacío',
            'apellido.required' => 'El Apellido no puede quedar vacío',
            'fecha_nacimiento.required' => 'La Fecha de Nacimiento no puede quedar vacía',
            'fecha_ingreso.required' => 'La Fecha de Ingreso no puede quedar vacía',
        ];
    }
}
