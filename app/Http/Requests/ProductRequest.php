<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
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
            'name' => ['required', 'string', 'min:10'],
            'article' => ['sometimes', 'alpha_num', Rule::unique('products')->ignore($this->article)],
            'status' => ['required', 'in:available,unavailable'],
            'data' => ['required', 'array'],
        ];
    }

    protected function prepareForValidation()
    {
        if ($this->has('data') && is_string($this->data)) {
            // Преобразуем JSON-строку в массив, если это возможно
            $decodedData = json_decode($this->data, true);
    
            if (json_last_error() === JSON_ERROR_NONE) {
                $this->merge([
                    'data' => $decodedData,
                ]);
            } else {
                // Если JSON некорректен, очищаем поле
                $this->merge([
                    'data' => null,
                ]);
            }
        }
    }
}
