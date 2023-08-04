<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCarRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "brand_id" => "required",
            "model" => "required|max:50",
            "engine_id" => "required|max:50",
            "price" => "required",
        ];
    }

    public function messages(): array
    {
        return [
            "brand_id.required" => "Il campo è obbligatorio",
            "model.required" => "Il campo è obbligatorio",
            "engine_id.required" => "Il campo è obbligatorio",
            "price.required" => "Il campo è obbligatorio",
        ];
    }
}
