<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AdminFormRequest extends FormRequest
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
            'name' => ['required', 'max:30'],
            'username' => ['required', 'max:15', 'min:4', 'unique:users,username'],
            'password' => ['required', 'min:6',],
            'email' => ['required', 'unique:users,email'],
            'phone' => ['required', 'max:15'],
            'address' => ['required'],
            'gender' => ['required']
        ];
    }
    public function messages()
{
    return [
        'name.required' => 'Nama tidak boleh kosong',
        'name.max:30' => 'Nama tidak boleh lebih dari 30',
        'username.required' => 'Username tidak boleh kosong',
        'username.max:15' => 'Username tidak boleh lebih dari 15',
        'username.min:4' => 'Username tidak boleh kurang dari 4',
        'username.unique' => 'Username telah terdaftar',
        'password.required' => 'password tidak boleh kosong',
        'password.min:6' => 'password tidak boleh kurang dari 6',
        'email.required' => 'email tidak boleh kosong',
        'email.unique' => 'email telah terdaftar',
        'phone.required' => 'phone tidak boleh kosong',
        'phone.max:15' => 'phone tidak boleh lebih dari 15',
        'address.required' => 'address tidak boleh kosong',
        'gender.required' => 'gender tidak boleh kosong',
    ];
}
}
