<?php

namespace App\Http\Requests\Product;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProductRequest extends FormRequest
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
            'name'      => ['required' ,'string', 'max:10'],
            'status'    => ['required' ,'boolean'],
            'quantity'  => ['required' ,'integer'],
        ];
    }

    public function messages()
    {
        return [
            'name.required'     => 'El campo nombre es requerido',
            'name.string'       => 'El campo nombre debe ser un texto',
            'name.max'          => 'El campo nombre debe tener longitud maximo 5',
            'status.required'   => 'El campo estado es requerido',
            'status.boolean'    => 'El campo estado debe ser true o false',
            'quantity.required' => 'El campo cantidad es requerido',
            'quantity.integer'  => 'El campo cantidad debe ser un numero',
        ];
    }
}
