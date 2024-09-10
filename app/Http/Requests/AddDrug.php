<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddDrug extends FormRequest
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
            'drug_name' => 'required|string|max:255',
            'dosage' => 'required|string|max:255',
            'quantity' => 'required|numeric|min:0|max:1000',
            'price' => 'required|numeric|min:0|max:1000000',
        ];
    }
}
