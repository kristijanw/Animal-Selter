<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class UserPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Naziv je obavezan podatak',
            'email.required' => 'Email je obavezan podatak',
            'password.required' => 'Lozinka je obavezan podatak',
        ];
    }
}
