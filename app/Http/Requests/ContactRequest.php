<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            "phone" => ["required", "regex:/^(\(\d{2}\))\s9\d{4}-\d{4}$/"],
            "email" => ["nullable", "email", "max:55"],
            "notes" => ["nullable", "max:512"]
        ];
    }

    public function messages()
    {
        return [
            "name.required" => "O nome é obrigatório",
            "name.max" => "O nome deve ter no máximo 55 caracteres",
            "phone.required" => "O telefone é obrigatório",
            "phone.regex" => "O telefone está no formato incorreto",
            "email.email" => "O email tem que ser válido",
            "email.max" => "O email tem que ter no máximo 55 caracteres",
            "notes.max" => "A descrição não pode ultrapassar 512 caracteres",
        ];
    }
}
