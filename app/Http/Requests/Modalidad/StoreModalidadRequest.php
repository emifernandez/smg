<?php

namespace App\Http\Requests\Modalidad;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\Uppercase;

class StoreModalidadRequest extends FormRequest
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
            'descripcion' => 'required|unique:modalidades,descripcion',
            'descripcion' => ['string', new Uppercase],
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
            'descripcion.required' => 'Debe ingresar la descripción de la modalidad',
            'descripcion.unique' => 'La modalidad ingresada ya existe',
        ];
    }
}
