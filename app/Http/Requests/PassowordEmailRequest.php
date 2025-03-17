<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PassowordEmailRequest extends FormRequest
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
            "email" => ["required", "email"]
        ];
    }

    public function messages(): array
    {
        return [
            "email.required" => "O email é um campo obrigatório",
            "email.email" => "O email deve ser válido",
        ];
    }
}
