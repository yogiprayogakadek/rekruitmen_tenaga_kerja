<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class PetugasRequest extends FormRequest
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
        $rules =  [
            'nama' => 'required',
            'telepon' => 'required|numeric',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
        ];

        if(!Request::instance()->has('id')) {
            $rules += [
                'status' => 'nullable',
                'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'email' => 'required',
                'username' => 'required',
                'password' => 'required',
            ];
        } else {
            $rules += [
                'status' => 'required',
                'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
            ];
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'required' => ':attribute tidak boleh kosong',
            'min' => ':attribute minimal :min karakter',
            'max' => ':attribute maksimal :max karakter',
            'mimes' => ':attribute harus berupa file :values',
            'image' => ':attribute harus berupa file gambar',
        ];
    }

    public function attributes()
    {
        return [
            'nama' => 'Nama',
            'email' => 'Email',
            'telepon' => 'Telepon',
            'tempat_lahir' => 'Tempat Lahir',
            'tanggal_lahir' => 'Tanggal Lahir',
            'username' => 'Username',
            'password' => 'Password',
            'status' => 'Status',
            'foto' => 'Foto',
        ];
    }
}
