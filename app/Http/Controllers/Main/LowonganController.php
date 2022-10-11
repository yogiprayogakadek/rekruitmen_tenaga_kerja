<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Http\Requests\LowonganRequest;
use App\Models\Lowongan;
use Illuminate\Http\Request;
use Image;

class LowonganController extends Controller
{
    public function index()
    {
        return view('main.lowongan.index');
    }

    public function render()
    {
        $lowongan = Lowongan::with('user')->get();

        $view = [
            'data' => view('main.lowongan.render', compact('lowongan'))->render(),
        ];

        return response()->json($view);
    }

    public function create()
    {
        $view = [
            'data' => view('main.lowongan.create')->render(),
        ];

        return response()->json($view);
    }

    public function store(LowonganRequest $request)
    {
        try {
            $data = [
                'user_id' => auth()->user()->id,
                'nama' => $request->nama,
                'deskripsi' => $request->deskripsi,
                'status' => true
            ];

            if($request->hasFile('foto')) {
                //get filename with extension
                $filenamewithextension = $request->file('foto')->getClientOriginalName();

                //get file extension
                $extension = $request->file('foto')->getClientOriginalExtension();

                //filename to store
                $filenametostore = $request->nama . '-' . time() . '.' . $extension;
                $save_path = 'assets/uploads/lowongan';

                if (!file_exists($save_path)) {
                    mkdir($save_path, 666, true);
                }
                $img = Image::make($request->file('foto')->getRealPath());
                $img->resize(512, 512);
                $img->save($save_path . '/' . $filenametostore);

                $data['foto'] = $save_path . '/' . $filenametostore;
            }

            Lowongan::create($data);

            return response()->json([
                'status' => 'success',
                'message' => 'Data saved successfully',
                'title' => 'Successfully'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Something went wrong',
                'title' => 'Failed'
            ]);
        }
    }

    public function edit($id) 
    {
        $lowongan = Lowongan::find($id);
        $view = [
            'data' => view('main.lowongan.edit', compact('lowongan'))->render()
        ];

        return response()->json($view);
    }

    public function update(LowonganRequest $request)
    {
        try {
            $lowongan = Lowongan::find($request->id);
            $data = [
                'user_id' => auth()->user()->id,
                'nama' => $request->nama,
                'deskripsi' => $request->deskripsi,
                'status' => $request->status
            ];

            if($request->hasFile('foto')) {
                unlink($lowongan->foto);
                //get filename with extension
                $filenamewithextension = $request->file('foto')->getClientOriginalName();

                //get file extension
                $extension = $request->file('foto')->getClientOriginalExtension();

                //filename to store
                $filenametostore = $request->nama . '-' . time() . '.' . $extension;
                $save_path = 'assets/uploads/lowongan';

                if (!file_exists($save_path)) {
                    mkdir($save_path, 666, true);
                }
                $img = Image::make($request->file('foto')->getRealPath());
                $img->resize(512, 512);
                $img->save($save_path . '/' . $filenametostore);

                $data['foto'] = $save_path . '/' . $filenametostore;
            }

            $lowongan->update($data);

            return response()->json([
                'status' => 'success',
                'message' => 'Data saved successfully',
                'title' => 'Successfully'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                // 'message' => 'Something went wrong',
                'message' => 'Something went wrong',
                'title' => 'Failed'
            ]);
        }
    }
}
