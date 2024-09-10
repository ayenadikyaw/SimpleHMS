<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddMessage extends FormRequest
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
            'message' => 'required|string|max:255',
            'sender_id' => 'required|integer',
            'receiver_id' => 'required|integer',
            'is_vip' => 'required|boolean',
            'time' => 'required|date_format:H:i',
        ];
    }
}
