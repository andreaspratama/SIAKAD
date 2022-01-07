<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class GuruRequest extends FormRequest
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
            'nip' => 'required|unique:gurus,nip',
            'nama' => 'required|string|min:3',
            'image' => 'required|image|mimes:jpeg,png,jpg,giv,svg'
        ];
    }

    public function messages()
    {
        return [
            'nip.unique' => 'NIP sudah digunakan',
            'nip.required' => 'NIP tidak boleh kosong',
            'nama.required' => 'Nama tidak boleh kosong',
            'nama.min' => 'Nama minimal 3 karakter',
            'nama.string' => 'Nama harus huruf',
            'image.image' => 'File harus gambar',
            'image.required' => 'Foto harus dimasukan',
            'image.mimes' => 'File harus berformat jpeg,jpg,giv,svg,png'
        ];
    }
}
