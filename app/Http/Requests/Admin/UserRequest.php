<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

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
            'name' => 'required',
            'username' => 'required',
            'password' => 'required|min:8',
            'role' => 'required',
            'image' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama tidak boleh kosong',
            'username.required' => 'Username tidak boleh kosong',
            'password.min' => 'Password minimal 8 karakter',
            'password.required' => 'Password tidak boleh kosong',
            'role.required' => 'Role tidak boleh kosong',
            'image.required' => 'Foto tidak boleh kosong'
        ];
    }
}
