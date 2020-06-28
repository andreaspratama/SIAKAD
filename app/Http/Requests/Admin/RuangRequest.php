<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class RuangRequest extends FormRequest
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
            'kode_ruang' => 'required',
            'nama_ruang' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'kode_ruang.required' => 'Kode Ruang tidak boleh kosong',
            'nama_ruang.required' => 'Nama Ruang tidak boleh kosong'
        ];
    }
}
