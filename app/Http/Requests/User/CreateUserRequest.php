<?php

namespace App\Http\Requests\User;

use App\Models\User;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;

class CreateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user()->is_admin();
    }

    public function prepareForValidation()
    {
        $this->merge([
            'document' => preg_replace('/\D/', '', $this->input('document')), // limpa antes de validar
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>'email',
     */
    public function rules(): array
    {
        return [
            'name' => [
                'required', 'string', 'max:255'
            ],
            'document' => [
                'required', 'max:14', 'cpf', 'unique:users,document'
            ],
            'email' => [
                'required', 'email', 'lowercase', 'max:255', 'unique:' . User::class,
            ],
            'password' => [
                'required', 'confirmed', Password::default()->letters()->numbers()
            ],
            'position' => [
                'required', 'string', 'max:255'
            ],
            'birth_date' => [
                'required', 'date_format:d/m/Y',
            ],
            'zipcode' => [
                'required', 'formato_cep', 'max:9'
            ],
            'street' => [
                'required', 'string', 'max:255'
            ],
            'number' => [
                'required', 'string', 'max:255'
            ],
            'complement' => [
                'required', 'string', 'max:255'
            ],
            'neighborhood' => [
                'required', 'string', 'max:255'
            ],
            'city' => [
                'required', 'string', 'max:255'
            ],
            'state' => [
                'required', 'string', 'max:2'
            ]
        ];
    }

    public function messages(): array
    {
        return [
            'document' => 'Já existe um usuário com o documento informado.'
        ];
    }
}
