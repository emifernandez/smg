<?php

namespace App\Http\Requests\ListaPrecioModalidad;

use Illuminate\Foundation\Http\FormRequest;

class StoreListaPrecioModalidadRequest extends FormRequest
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
            'id' => 'required',
            'modalidad_id' => 'required',
            'id' => 'unique_with:lista_precios_modalidades,modalidad_id',
            'precio' => 'required',
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
            'id.unique_with' => 'Los valores ingresados ya se encuentran cargados',
            //'id.unique' => 'Los valores ingresados ya se encuentran cargados',
            //'modalidad_id.required' => 'Debe ingresar la modalidad',
            'precio.required' => 'El precio no puede quedar vacía',
        ];
    }

}
