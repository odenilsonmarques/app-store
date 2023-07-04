<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStoreCategory extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'=>['required','string','min:3','max:255','unique:categories'],
            'description' => ['required','string','min:10','max:255'],
        ];
    }

    public function messages()
    {
        return [
            'name.required'=>'O campo nome categoria é obrigatório',
            'name.min'=>'O campo nome categoria deve ter no mínimo 3 caracteres',
            'name.max'=>'O campo nome categoria deve ter no maximo 255 caracteres',
            'name.unique'=>'Já existe uma categoria com esse nome, por favor informe outro',

            'description.required'=>'O campo descrição é obrigatório',
            'description.max'=>'O campo descrição deve ter no maximo 255 caracteres',
            'description.min'=>'O campo descrição deve ter no mínimo 10 caracteres',
        ];
    }
}
