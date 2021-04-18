<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EsculturaResquest extends FormRequest
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
            'material' => 'required',
            'estado' => 'required',
            'altura' => 'required',
            'largura' => 'required',
            'profundidade' => 'required',
            'peso' => 'required', 
            'ano_aquisicao' => 'required',
            'valor' => 'required', 
            'imagem' => 'required|mimes:png,jpg',
        ];
    }
}
