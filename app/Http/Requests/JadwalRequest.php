<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class JadwalRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [
            'lamaran' => 'required',
            'prainterview' => 'required',
            'jam' => 'required',
            'menit' => 'required',
            'lokasi' => 'required',
            'keterangan' => 'required',
        ];

        if(!Request::instance()->has('jadwal_id')) {
            $rules += ['status' => 'nullable'];
        } else {
            $rules += [
                'status' => 'required',
                // 'finalinterview' => 'required',
                // 'jam_final' => 'required',
                // 'menit_final' => 'required',
                // 'lokasi_final' => 'required',
            ];
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'required' => ':attribute harus diisi',
        ];
    }

    public function attributes()
    {
        return [
            'lamaran' => 'Lamaran',
            'prainterview' => 'Tanggal pra interview',
            'jam' => 'Jam',
            'menit' => 'Menit',
            'lokasi' => 'Lokasi',
            'keterangan' => 'Keterangan',
            'status' => 'Status',
        ];
    }
}
