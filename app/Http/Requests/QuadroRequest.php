<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class QuadroRequest extends FormRequest
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
            'artista' => 'required',
            'tecnica' => 'required',
            'ano_aquisicao' => 'required',
            'valor' => 'required',
            'medidas' => 'required',
            'imagem' => 'required|file|mimes:png,jpg',
        ];
    }
}
