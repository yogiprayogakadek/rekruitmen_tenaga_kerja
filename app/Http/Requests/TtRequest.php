<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TtRequest extends FormRequest
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
        $rules =  [
            'nama' => 'required',
            'email' => 'required|email',
            'telepon' => 'required|numeric',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'berat_badan' => 'required|numeric',
            'tinggi_badan' => 'required|numeric',
            'marital_status' => 'required',
            'username' => 'required',
            'password' => 'required|same:konfirmasi_password|min:8',
            'konfirmasi_password' => 'required|same:password|min:8',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ];

        return $rules;
    }

    public function messages()
    {
        return [
            'required' => ':attribute tidak boleh kosong',
            'min' => ':attribute minimal :min karakter',
            'max' => ':attribute maksimal :max karakter',
            'unique' => ':attribute sudah digunakan',
            'mimes' => ':attribute harus berupa file :values',
            'image' => ':attribute harus berupa file gambar',
            'same' => ':attribute tidak sama dengan :other',
            'date' => ':attribute harus berupa tanggal',
            'numeric' => ':attribute harus berupa angka',
            'regex' => ':attribute panjang 12 karakter',
        ];
    }

    public function attributes()
    {
        return [
            'nama' => 'Nama',
            'email' => 'Email',
            'telepon' => 'Telepon',
            'tempat_lahir' => 'Tempat lahir',
            'tanggal_lahir' => 'Tanggal lahir',
            'jenis_kelamin' => 'Jenis kelamin',
            'agama' => 'Agama',
            'alamat' => 'Alamat',
            'berat_badan' => 'Berat badan',
            'tinggi_badan' => 'Tinggi badan',
            'marital_status' => 'Marital status',
            'username' => 'Username',
            'password' => 'Password',
            'konfirmasi_password' => 'Konfirmasi password',
            'foto' => 'Foto',
        ];
    }
}
