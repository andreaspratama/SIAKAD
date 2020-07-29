<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SiswaRequest extends FormRequest
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
            'nisn' => 'required|unique:siswas,nisn',
            'nama' => 'required|min:3|string',
            'tpt_lahir' => 'required|min:3',
            'tgl_lahir' => 'required',
            'jns_kelamin' => 'required',
            'agama' => 'required',
            'alamat' => 'required|min:5',
            'nama_ortu' => 'required',
            'kelas' => 'required',
            'asal_sklh' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,giv,svg'
        ];
    }

    public function messages()
    {
        return [
            'nisn.unique' => 'NISN sudah digunakan',
            'nisn.required' => 'NISN tidak boleh kosong',
            'nama.required' => 'Nama tidak boleh kosong',
            'nama.min' => 'Nama minimal 3 karakter',
            'nama.string' => 'Nama harus huruf',
            'tpt_lahir.required' => 'Tempat tanggal lahir tidak boleh kosong',
            'tpt_lahir.min' => 'Tempat tanggal lahir minimal 3 karakter',
            'tgl_lahir.required' => 'Tanggal lahir tidak boleh kosong',
            'alamat.required' => 'Alamat tidak boleh kosong',
            'alamat.min' => 'Alamat minimal 3 karakter',
            'nama_ortu.required' => 'Nama Orang Tua tidak boleh kosong',
            'asal_sklh.required' => 'Asal Sekolah tidak boleh kosong',
            'image.image' => 'File harus gambar',
            'image.required' => 'Foto harus dimasukan',
            'image.mimes' => 'File harus berformat jpeg,jpg,giv,svg,png'
        ];
    }
}
