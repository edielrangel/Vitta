<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateArtigoRequest extends FormRequest
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
            'titulo' => 'required',
            'revista' => 'required',
            'cidade' => 'required',
            'volume' => 'required',
            'numero' => 'required',
            'ano' => 'required|numeric',
            'paginas' => 'required',
            'doi' => 'url|unique:artigos,doi',
            'palavras_chave' => 'max:250',
        ];
    }
}
