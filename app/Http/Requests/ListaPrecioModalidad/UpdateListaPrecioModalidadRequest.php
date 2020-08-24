<?php

namespace App\Http\Requests\ListaPrecioModalidad;

use Illuminate\Foundation\Http\FormRequest;

class UpdateListaPrecioModalidadRequest extends FormRequest
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
            'precio.required' => 'El precio no puede quedar vacía',
        ];
    }
}
