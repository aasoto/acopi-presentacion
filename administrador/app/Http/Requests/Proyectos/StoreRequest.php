<?php

namespace App\Http\Requests\Proyectos;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'sector_id' => 'required|integer',
            'nombre' => 'required|max:200|string',
            'descripcion' => 'required|string|max:370',
            'contenido' => 'required|string',
            'imagen_proyecto' => 'required|image|mimes:jpeg,jpg,png|max:10240'
        ];
    }
}
