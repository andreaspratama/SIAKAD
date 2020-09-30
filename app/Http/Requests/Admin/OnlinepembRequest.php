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
            'nisn' => 'required|exists:siswas,nisn',
            'jenispem_id' => 'required|exists:jenispems,id',
            'nama' => 'required',
            'kelas' => 'required',
            'tanggal' => 'required|date',
            'image' => 'required|image|mimes:jpeg,png,jpg,giv,svg'
        ];
    }

    public function messages()
    {
        return [
            'nisn.exists' => 'Nisn Tidak Sesuai',
            'nisn.required' => 'Nisn Tidak Boleh Kosong',
            'jenispem_id.exists' => 'Jenis Pembayaran Tidak Sesuai',
            'jenispem_id.required' => 'Jenis Pembayaran Tidak Boleh Kosong',
            'nama.required' => 'Nama Tidak Boleh Kosong',
            'kelas.required' => 'Kelas Tidak Boleh Kosong',
            'tanggal.required' => 'Tanggal Tidak Boleh Kosong',
            'image.required' => 'Gambar Tidak Boleh Kosong',
            'image.image' => 'File Harus Berupa Gambar',
            'image.mimes' => 'File harus berformat jpeg,jpg,giv,svg,png'
        ];
    }
}
