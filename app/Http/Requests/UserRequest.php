<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Arr;

class UserRequest extends FormRequest
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
            "name" => ["required", "max:55"],
            "email" => ["required", "email", "max:55"],
            "password" => ["required", "confirmed", "min:8"]
        ];
    }

    public function messages(): array
    {
        return [
            "name.required" => "O nome é obrigatório",
            "name.max" => "O nome não pode ultrapassar 55 caracteres",
            "email.required" => "O email é obrigatório",
            "email.email" => "O email tem que ser válido",
            "email.max" => "O email não pode ter mais de 55 caracteres",
            "password.required" => "A senha é obrigatória",
            "password.confirmed" => "As senhas não conferem",
            "password.min" => "A senha deve ter pelo menos 8 caracteres",
        ];
    }
}
