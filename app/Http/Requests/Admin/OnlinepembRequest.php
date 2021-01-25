<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class OnlinepembRequest extends FormRequest
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
            'jenispem_id' => 'required|exists:jenispems,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,giv,svg'
        ];
    }

    public function messages()
    {
        return [
            'jenispem_id.exists' => 'Jenis Pembayaran Tidak Sesuai',
            'jenispem_id.required' => 'Jenis Pembayaran Tidak Boleh Kosong',
            'image.required' => 'Gambar Tidak Boleh Kosong',
            'image.image' => 'File Harus Berupa Gambar',
            'image.mimes' => 'File harus berformat jpeg,jpg,giv,svg,png'
        ];
    }
}
