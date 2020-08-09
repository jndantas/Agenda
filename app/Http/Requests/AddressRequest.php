<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddressRequest extends FormRequest
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
                    'cep' => 'min:8|max:9|required',
                    'street' => 'required|min:4',
                    'district' => 'required|min:4',
                    'number' => 'required|min:1',
                    'city' => 'required|min:4',
                    'state' => 'required|min:2|max:2',
                ];
                break;
            }
            case 'PUT':
                return [
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
