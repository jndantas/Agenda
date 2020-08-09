<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerRequest extends FormRequest
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
        switch($this->method())
        {
            case 'POST':
            {
                return [
                    'enterprise' => 'required|min:4',
                    'cnpj' => 'required|cnpj|unique:customers',
                    'phone' => 'required|telefone_com_ddd',
                    'responsible' => 'required|min:4',
                    'cep' => 'min:8|max:9|required',
                    'street' => 'required|min:4',
                    'district' => 'required|min:4',
                    'number' => 'required|min:1',
                    'city' => 'required|min:4',
                    'state' => 'required|min:2|max:2',
                    'email' => 'required|email|unique:customers'
                ];
                break;
            }
            case 'PUT':
                return [
                    'enterprise' => 'required|min:4',
                    'cnpj' => 'required|cnpj|unique:customers'. $this->id,
                    'phone' => 'required|telefone_com_ddd',
                    'responsible' => 'required|min:4',

                    'email' => 'required|email|unique:customers'. $this->id
                ];
                break;
            default:
                break;
        }
    }

    /**
     * @return array|string[]
     */
    public function messages(){
        return [
            'cnpj.required' => 'Por favor digite um CNPJ!',
            'email.required' => 'Por favor digite um e-mail válido!',
            'email.unique' => 'Esse E-mail já existe, por favor escolha outro!',
            'enterprise.required' => 'Por favor digite o nome da Empresa!',
            'phone.required' => 'Por favor digite um Telefone!',
            'responsible.required' => 'Por favor digite o nome do Responsável!',
            'cep.required' => 'Por favor digite um CEP válido!',
            'street.required' => 'Por favor digite o nome da Rua!',
            'district.required' => 'Por favor digite o nome do Bairro!',
            'number.required' => 'Por favor digite o número',
            'city.required' => 'Por favor digite a Cidade!',
            'state.required' => 'Por favor digite o Estado!',
            'id.required.required' => 'O campo id é obrigatorio.',
            'id.numeric' => 'O campo id deve ser numerico',
        ];
    }
}
