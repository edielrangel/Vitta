<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GravuraRequest extends FormRequest
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
            'tipo_gravura' => 'required',
            'artista' => 'required',
            'tiragem' => 'required',
            'ano_aquisicao' => 'required',
            'acid' => 'required',
            'imagem' => 'file|mimes:png,jpg',
            'tumbnail' => 'file|mimes:png,jpg'
        ];
    }
}
