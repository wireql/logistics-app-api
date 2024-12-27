<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VehicleStoreRequest extends FormRequest
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
            'registration_number' => ['required', 'max:10'],
            'model' => ['required', 'max:50'],
            'brand' => ['required', 'max:50'],
            'year' => ['required', 'date_format:Y'],
            'vin' => ['required', 'max:17'],
            'engine_capacity' => ['required', 'decimal:0,999'],
            'mileage' => ['required', 'integer'],
            'category_id' => ['required', 'integer', 'exists:vehicle_categories,id'],
            'fuel_type_id' => ['required', 'integer', 'exists:fuel_types,id'],
            'status_id' => ['required', 'integer', 'exists:vehicle_statuses,id'],
            'body_type_id' => ['required', 'integer', 'exists:body_types,id'],
        ];
    }

    public function messages(): array
    {
        return [
            'registration_number.required' => 'Поле `Регистрационный номер` обязательно для заполнения.',
            'registration_number.max' => 'Поле `Регистрационный номер` не должно превышать :max символов.',

            'model.required' => 'Поле `Модель` обязательно для заполнения.',
            'model.max' => 'Поле `Модель` не должно превышать :max символов.',

            'brand.required' => 'Поле `Марка` обязательно для заполнения.',
            'brand.max' => 'Поле `Марка` не должно превышать :max символов.',

            'year.required' => 'Поле `Год выпуска` обязательно для заполнения.',
            'year.date_format' => 'Поле `Год выпуска` должно быть в формате YYYY.',

            'vin.required' => 'Поле `VIN` обязательно для заполнения.',
            'vin.max' => 'Поле `VIN` не должно превышать :max символов.',

            'engine_capacity.required' => 'Поле `Объем двигателя` обязательно для заполнения.',
            'engine_capacity.integer' => 'Поле `Объем двигателя` должно быть числом.',

            'mileage.required' => 'Поле `Пробег` обязательно для заполнения.',
            'mileage.integer' => 'Поле `Пробег` должно быть числом.',

            'category_id.required' => 'Поле `Категория` обязательно для заполнения.',
            'category_id.integer' => 'Поле `Категория` должно быть числом.',
            'category_id.exists' => 'Выбранная категория не существует.',

            'fuel_type_id.required' => 'Поле `Тип топлива` обязательно для заполнения.',
            'fuel_type_id.integer' => 'Поле `Тип топлива` должно быть числом.',
            'fuel_type_id.exists' => 'Выбранный тип топлива не существует.',

            'status_id.required' => 'Поле `Статус` обязательно для заполнения.',
            'status_id.integer' => 'Поле `Статус` должно быть числом.',
            'status_id.exists' => 'Выбранный статус не существует.',

            'body_type_id.required' => 'Поле `Тип кузова` обязательно для заполнения.',
            'body_type_id.integer' => 'Поле `Тип кузова` должно быть числом.',
            'body_type_id.exists' => 'Выбранный тип кузова не существует.',
        ];
    }

}
