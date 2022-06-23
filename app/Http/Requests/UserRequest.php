<?php

namespace App\Http\Requests;

use App\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => [
                'required',
                'string',
                'min:7',
                'confirmed',
                'regex:/[A-Z]/',
                'regex:/[0-9]/'
            ],
            'phone_number' => ['required'],
            'status' => ['required', Rule::in('1', '0')],
            'role' => ['required', Rule::in(User::rolesType())],

        ];
    }

    public function messages()
    {
        return [
            'password.regex' => 'Password must contain at least one capital letter',
            'password.regex' => 'Password must contain at least one number',
        ];
    }


}
