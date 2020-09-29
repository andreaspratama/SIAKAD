<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ExkulRequest extends FormRequest
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
            'nm_exkul' => 'required',
            'hari' => 'required',
            'jam' => 'required'
        ];
    }

    public function messages()
{
        return [
            'nm_exkul.required' => 'Nama Exkul tidak boleh kosong',
            'hari.required' => 'Hari Pelaksanaan tidak boleh kosong',
            'jam.required' => 'Jam Pelaksanaan tidak boleh kosong',
        ];
    }
}
