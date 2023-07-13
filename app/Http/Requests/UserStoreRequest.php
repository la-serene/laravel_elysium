<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
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
            'username' => [
                'bail',
                'unique:App\Models\User,username',
                'string',
                'max:20',
                'required',
            ],
            'first_name' => [
                'bail',
                'string',
                'required',
            ],
            'last_name' => [
                'bail',
                'string',
                'required',
            ],
            'phone_number' => [
                'bail',
                'string',
                'max:11',
                'min:10',
                'required',
            ],
            'address' => [
                'bail',
                'string',
            ],
            'date_of_birth' => [
                'bail',
                'required',
                'date',
                'before:today',
            ],
            'email' => [
                'bail',
                'required',
                'string',
                'unique:App\Models\User,email'
            ],
            'password' => [
                'bail',
                'required',
                'string',
                'min:4',
                'confirmed',
            ],
            'gender' => [
                'bail',
                'boolean',
            ]
        ];
    }
}
