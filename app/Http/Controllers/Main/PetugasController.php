<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Http\Requests\PetugasRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Image;

class PetugasController extends Controller
{
    public function index()
    {
        return view('main.petugas.index');
    }

    public function render()
    {
        $petugas = User::where('role', 'Petugas')->get();

        $view = [
            'data' => view('main.petugas.render', compact('petugas'))->render(),
        ];

        return response()->json($view);
    }

    public function create()
    {
        $view = [
            'data' => view('main.petugas.create')->render(),
        ];

        return response()->json($view);
    }

    public function store(PetugasRequest $request)
    {
        try {
            $data = [
                'nama' => $request->nama,
                'email' => $request->email,
                'telepon' => $request->telepon,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'username' => $request->username,
                'password' => bcrypt($request->password),
                'role' => 'Petugas',
                'status' => true
            ];

            if($request->hasFile('foto')) {
                //get filename with extension
                $filenamewithextension = $request->file('foto')->getClientOriginalName();

                //get file extension
                $extension = $request->file('foto')->getClientOriginalExtension();

                //filename to store
                $filenametostore = $request->nama . '-' . time() . '.' . $extension;
                $save_path = 'assets/uploads/petugas';

                if (!file_exists($save_path)) {
                    mkdir($save_path, 666, true);
                }
                $img = Image::make($request->file('foto')->getRealPath());
                $img->resize(512, 512);
                $img->save($save_path . '/' . $filenametostore);

                $data['foto'] = $save_path . '/' . $filenametostore;
            }

            User::create($data);

            return response()->json([
                'status' => 'success',
                'message' => 'Data berhasil disimpan',
                'title' => 'Berhasil'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
                'title' => 'Failed'
            ]);
        }
    }

    public function edit($id) 
    {
        $petugas = User::find($id);
        $view = [
            'data' => view('main.petugas.edit', compact('petugas'))->render()
        ];

        return response()->json($view);
    }

    public function update(PetugasRequest $request)
    {
        try {
            $petugas = User::find($request->id);
            $data = [
                'nama' => $request->nama,
                'telepon' => $request->telepon,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'role' => 'Petugas',
                'status' => true
            ];

            if($request->hasFile('foto')) {
                // unlink($petugas->foto);
                //get filename with extension
                $filenamewithextension = $request->file('foto')->getClientOriginalName();

                //get file extension
                $extension = $request->file('foto')->getClientOriginalExtension();

                //filename to store
                $filenametostore = $request->nama . '-' . time() . '.' . $extension;
                $save_path = 'assets/uploads/petugas';

                if (!file_exists($save_path)) {
                    mkdir($save_path, 666, true);
                }
                $img = Image::make($request->file('foto')->getRealPath());
                $img->resize(512, 512);
                $img->save($save_path . '/' . $filenametostore);

                $data['foto'] = $save_path . '/' . $filenametostore;
            }

            $petugas->update($data);

            return response()->json([
                'status' => 'success',
                'message' => 'Data berhasil disimpan',
                'title' => 'Berhasil'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                // 'message' => 'Something went wrong',
                'message' => $e->getMessage(),
                'title' => 'Failed'
            ]);
        }
    }
}
