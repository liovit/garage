<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'name' => 'required|max:35',
            'last_name' => 'required|max:45',
            'date_of_birth' => 'required',
            'password' => 'required|min:8|max:99',
            'email' => 'required|unique:users,email|max:255',
            'phone' => 'required',
        ];
    }

    public function messages() 
    {
        return [
            'name.required' => 'First name is required.',
            'last_name.required' => 'Last name is required.',
            'email.unique' => 'User with such email already exists.',
        ];
    }
}
