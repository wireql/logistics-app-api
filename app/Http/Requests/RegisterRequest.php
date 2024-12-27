<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class RegisterRequest extends FormRequest
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
            'first_name' => ['required', 'string', 'max:50'],
            'last_name' => ['required', 'string', 'max:100'],
            'organization_name' => ['required', 'string', 'max:150'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'confirmed', Password::min(6)],
        ];
    }

    public function messages(): array
    {
        return [
            'first_name.required' => "Поле `Имя` обязательно для заполнения.",
            'first_name.string' => "Поле `Имя` должно быть строкой.",
            'first_name.max' => "Поле `Имя` не должно превышать :max символов.",
        
            'last_name.required' => "Поле `Фамилия` обязательно для заполнения.",
            'last_name.string' => "Поле `Фамилия` должно быть строкой.",
            'last_name.max' => "Поле `Фамилия` не должно превышать :max символов.",
        
            'organization_name.required' => "Поле `Название организации` обязательно для заполнения.",
            'organization_name.string' => "Поле `Название организации` должно быть строкой.",
            'organization_name.max' => "Поле `Название организации` не должно превышать :max символов.",
        
            'email.required' => "Поле `Электронная почта` обязательно для заполнения.",
            'email.email' => "Поле `Электронная почта` должно быть действительным адресом электронной почты.",
            'email.unique' => "Этот адрес электронной почты уже зарегистрирован.",
        
            'password.required' => "Поле `Пароль` обязательно для заполнения.",
            'password.confirmed' => "Пароли не совпадают.",
            'password.min' => "Пароль должен содержать минимум :min символов.",
        ];        
    }
}
