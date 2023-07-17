<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateStoreProduct extends FormRequest
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
            'name'=>['required','string','min:3','max:30','unique:products'],
            'category_id'=>['required'],
            'quantity'=>['required','integer','min:1','regex:/^\d+$/'],
            'confirm_quantity'=>['required','integer','min:1','regex:/^\d+$/'],
            'minimum_quantity'=>['required','integer','min:1','regex:/^\d+$/'],

            'cost_price'=>['required','string'],
            'sale_price'=>['required','string'],

            'description' => ['required','string','min:15','max:500'],
            'feature' => ['required','string','min:15','max:500'],
            'photo'=>['required','image','max:1024'],
        ];
    }

    public function messages()
    {
        return  [
            'name.required' => 'O campo  produto é obrigatório',
            'name.min' => 'O campo produto deve ter no  mínimo 5 caracteres',
            'name.max' => 'O campo produto deve ter no  máximo 30 caracteres',
            'name.unique' => 'Já existe um produto com o nome informado',

            'category_id.required'=>'O campo categoria é obrigatório',

            'quantity.required' => 'O campo quantidade é obrigatório',
            'quantity.integer' => 'O campo quantidade deve ser um número',
            'quantity.regex' => 'O campo quantidade só aceita números inteiros',
            'quantity.min'=>'O campo quantidade deve ter no mínimo 1 valor',

            'confirm_quantity.required' => 'O campo confirme quantidade é obrigatório',
            'confirm_quantity.integer' => 'O campo confirme quantidade deve ser um número',
            'confirm_quantity.regex' => 'O campo confirme quantidade só aceita números inteiros',
            'confirm_quantity.min'=>'O campo confirme quantidade deve ter no mínimo 1 valor',

            'minimum_quantity.required' => 'O campo quantidade minima é obrigatório',
            'minimum_quantity.integer' => 'O campo quantidade minima deve ser um número',
            'minimum_quantity.regex' => 'O campo quantidade minima só aceita números inteiros',
            'minimum_quantity.min'=>'O campo quantidade minima deve ter no mínimo 1 valor',

            'cost_price.required'=>'O campo preço de custo é obrigatório',
            'sale_price.required'=>'O campo preço de venda é obrigatório',

            'description.required' => 'O campo descrição é obrigatório',
            'description.min' => 'O campo descrição deve ter no  mínimo 10 caracteres',
            'description.max' => 'O campo descrição deve ter no  máximo 500 caracteres',

            'feature.required' => 'O campo características é obrigatório',
            'feature.min' => 'O campo características deve ter no  mínimo 10 caracteres',
            'feature.max' => 'O campo características deve ter no  máximo 500 caracteres',
            

            'photo.required'=>'O campo foto é obrigatório',
            'photo.image'=>'O campo foto deve uma imagem e ter no máximo :1024 kb',
            
        ];
        
    }
}
