<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules;

class SignUpRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'min: 5', 'max:100'],
            'email' => ['required', 'string', 'email', 'min:13', 'max:255', 'unique:users'],
            'password' => ['required', 'string','confirmed', Rules\Password::defaults()],
            'phone' => ['required', 'digits: 10', 'unique:users'],
            'address' => ['required', 'string', 'min: 10'],
        ];
    }
}
