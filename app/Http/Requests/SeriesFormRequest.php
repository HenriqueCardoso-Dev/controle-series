<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeriesFormRequest extends FormRequest
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
            'serieName' => 'required|min:2|string',
            'qtdSeasons' => 'required|min:1|numeric',
            'qtdChapters' => 'required|min:1|numeric'
        ];
    }

    public function messages()
    {
        return [
            'serieName.required' => 'O nome da série é obrigatório!',
            'qtdSeasons.required' => 'O número de temporadas é obrigatório!',
            'serieName.required' => 'O número de epsódios por temporada é obrigatório!',
            'serieName.min' => 'O  nome da série deve ter pelo menos 2 caracteres!'
        ];
    }
}
