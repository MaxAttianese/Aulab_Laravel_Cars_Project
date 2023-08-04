<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBuyerRequest extends FormRequest
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
            "firstname" => "required|max:50",
            "lastname" => "required|max:50",
        ];
    }

    public function messages(): array
    {
        return [
            "firstname.required" => "Il campo è obbligatorio",
            "lastname.required" => "Il campo è obbligatorio",
        ];
    }
}
