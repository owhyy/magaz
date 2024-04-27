<?php

namespace App\Http\Requests\Register;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'nickname' => ['required', 'string', 'max:25', 'unique:users'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
            'phone_number' => ['required', 'string', 'numeric', 'digits_between:11,15', 'unique:users'],
        ];
    }
}
