<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasswordUpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            "token" => ["required"],
            "password" => ["required", "confirmed", "min:8"]
        ];
    }

    public function messages(): array
    {
        return [
            "token.required" => "Um token é válido é necessário para resetar a senha",
            "password.required" => "É necessário colocar uma senha",
            "password.confirmed" => "As senhas não conferem",
            "password.min" => "A senha tem que ter no mínimo 8 caracteres",
        ];
    }
}
