<?php

namespace App\Http\Requests\Proveedor;

use Illuminate\Foundation\Http\FormRequest;

class StoreProveedorRequest extends FormRequest
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
            'ruc' => 'required|unique:proveedores,ruc',
            'nombre' => 'required',
            'apellido' => 'required'
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
            'ruc.required' => 'El Ruc no puede quedar vacío',
            'ruc.unique' => 'El Ruc ingresado ya existe',
            'nombre.required' => 'El Nombre no puede quedar vacío',
            'apellido.required' => 'El Apellido no puede quedar vacío',
        ];
    }
}
