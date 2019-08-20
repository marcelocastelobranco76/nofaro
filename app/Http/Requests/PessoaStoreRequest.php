<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PessoaStoreRequest extends FormRequest
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
            'nome' => 'required|string|min:2',
            'email' => 'required|email|unique:pessoas',
            'ddd' => 'numeric|digits:2',
            'telefone' => 'numeric|digits:9'
        ];
    }


     /**
     * Custom message for validation
     *
     * @return array
     */
    public function mensagensCadastro()
    {
        return [

            'nome.required' => 'O campo Nome deve ser preenchido!',
            'nome.min' => 'O campo Nome deve conter no mínimo 2 caracteres!',
          
            'email.required' => 'O campo Email deve ser preenchido!',
            'email.email' => 'O campo Email deve conter um email válido!',
            'email.unique' => 'Este e-mail já existe no banco de dados! Favor informe outro e-mail!',
          
                      
        ];
    }

    public function mensagensUpdate()
    {
        return [

            'nome.required' => 'O campo Nome deve ser preenchido!',
            'nome.min' => 'O campo Nome deve conter no mínimo 2 caracteres!',
          
            'email.required' => 'O campo Email deve ser preenchido!',
            'email.email' => 'O campo Email deve conter um email válido!',
            'email.unique' => 'Este e-mail já existe no banco de dados! Favor informe outro e-mail!',
          
                      
        ];
    }
}
