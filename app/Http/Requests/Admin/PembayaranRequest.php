<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class PembayaranRequest extends FormRequest
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
            'jenispem_id' => 'required|integer|exists:jenispems,id',
            'nisn' => 'required|exists:siswas,nisn',
            'nama' => 'required|min:3',
            'kelas' => 'required',
            'jum_pemb' => 'required',
            'keterangan' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'jenispem_id.required' => 'Jenis Pembayaran tidak boleh kosong',
            'nisn.required' => 'NISN tidak boleh kosong',
            'nisn.exists' => 'NISN tidak sesuai',
            'nama.required' => 'Nama tidak boleh kosong',
            'nama.min' => 'Nama minimal 3 karakter',
            'nama.string' => 'Nama harus huruf',
            'kelas.required' => 'Kelas tidak boleh kosong',
            'jum_pemb.required' => 'Jumlah Pembayaran tidak boleh kosong',
            'keterangan.required' => 'Keterangan tidak boleh kosong'
        ];
    }
}
