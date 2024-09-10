<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddRoom extends FormRequest
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
            'room_number' => $this->isMethod('put') ? 'required' : 'required|unique:rooms,room_no,' . $this->id . ',id,del_flag,0',
            'status' => 'required',
            'quantity' => 'required|integer|min:0|max:100',
            'price' => 'required|numeric|min:0.01|max:1000000',
        ];
    }
}
