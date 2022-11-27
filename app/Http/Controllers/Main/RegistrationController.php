<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegistrationRequest;
use App\Http\Requests\TtRequest;
use App\Models\Lamaran;
use App\Models\Pelamar;
use Illuminate\Http\Request;
use Image;

class RegistrationController extends Controller
{
    public function index()
    {
        return view('auth.registration');
    }

    public function store(RegistrationRequest $request)
    {
        try {
            $data = [
                'nama' => $request->nama,
                'email' => $request->email,
                'telepon' => $request->telepon,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'jenis_kelamin' => $request->jenis_kelamin,
                'agama' => $request->agama,
                'alamat' => $request->alamat,
                'berat_badan' => $request->berat_badan,
                'tinggi_badan' => $request->tinggi_badan,
                'marital_status' => $request->marital_status,
                'username' => $request->username,
                'password' => bcrypt($request->password),
            ];

            if($request->hasFile('foto')) {
                //get filename with extension
                $filenamewithextension = $request->file('foto')->getClientOriginalName();

                //get file extension
                $extension = $request->file('foto')->getClientOriginalExtension();

                //filename to store
                $filenametostore = $request->nama . '-' . time() . '.' . $extension;
                $save_path = 'assets/uploads/pelamar';

                if (!file_exists($save_path)) {
                    mkdir($save_path, 666, true);
                }
                $img = Image::make($request->file('foto')->getRealPath());
                $img->resize(512, 512);
                $img->save($save_path . '/' . $filenametostore);

                $data['foto'] = $save_path . '/' . $filenametostore;
            }

            
            $documents = [
                'cv' => "empty",
                'sertifikat_pengalaman_kerja' => "empty",
                'ijazah_terakhir' => "empty",
                'ktp' => "empty",
                'passport' => "empty", //kartu keluarga
                'sat' => "empty",
                'crowd' => "empty",
                'crisis' => "empty",
                'bst' => "empty",
                'seamenbook' => "empty",
            ];
            
            $data['documents'] = json_encode($documents);
            
            Pelamar::create($data);

            return redirect()->back()->with([
                'message' => 'Pendaftaran berhasil',
                'status' => 'success',
            ]);
        } catch (\Exception $e) {
            // dd($e->getMessage());
            return redirect()->back()->with([
                'message' => $e->getMessage(),
                // 'message' => 'Something went wrong',
                'status' => 'error',
            ]);
        }
    }
}
