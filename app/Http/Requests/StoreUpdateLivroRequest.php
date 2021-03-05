<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateLivroRequest extends FormRequest
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
            'titulo',
            'subtitulo',
            'edicao',
            'cidade',
            'ano',
            'notas',
            'paginas',
            'volume',
            'isbn',
            'cdd',
            'cdu',
            'categoria',
            'descricao',
            'observacao'
        ];
    }
}
