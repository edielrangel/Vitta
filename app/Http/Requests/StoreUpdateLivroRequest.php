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
            'titulo' => 'required|min:5',
            'edicao' => 'required',
            'cidade' => 'required|min:2',
            'ano' => 'required|integer',
            'paginas' => 'integer|min:2',
            'volume' => 'max:5',
            'isbn' => 'required|numeric|unique:livros,isbn',
            'cdd' => 'required',
        ];
    }
}
