<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email' => ['required', 'email', 'exists:users,email'],
            'password' => ['required'],
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => "Поле `Электронная почта` обязательно для заполнения.",
            'email.email' => "Введите действительный адрес электронной почты.",
            'email.exists' => "Указанная электронная почта не зарегистрирован в системе.",

            'password.required' => "Поле `Пароль` обязательно для заполнения.",
            'password.min' => "Пароль должен содержать минимум :min символов.",
        ];
    }
}
