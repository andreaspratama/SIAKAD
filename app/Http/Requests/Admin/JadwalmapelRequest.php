<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class JadwalmapelRequest extends FormRequest
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
            'mapel_id' => 'required|integer|exists:mapels,id',
            'guru_id' => 'required|integer|exists:gurus,id',
            'ruang_id' => 'required|integer|exists:ruangs,id',
            'kelas' => 'required',
            'hari' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'jam_mulai.required' => 'Jam Mulai tidak boleh kosong',
            'jam_selesai.required' => 'Jam Selesai tidak boleh kosong'
        ];
    }
}
