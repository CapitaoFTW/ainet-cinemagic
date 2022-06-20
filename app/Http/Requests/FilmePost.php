<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FilmePost extends FormRequest
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
        'titulo' => 'required|exists:generos,code',
        'genero_code' => 'required|unique:generos,code,'.$this->genero_code.',code',
        'ano' => 'required|integer',
        'cartaz_url' => 'nullable|url',
        'sumario' => 'required|string|max:25',
        'trailer_url' => 'nullable|url',
        ];
    }
}
