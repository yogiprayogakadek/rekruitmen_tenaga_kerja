<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Pelamar;
use Illuminate\Http\Request;

class PelamarController extends Controller
{
    public function index()
    {
        return view('main.pelamar.index');
    }

    public function render()
    {
        $pelamar = Pelamar::all();

        $view = [
            'data' => view('main.pelamar.render', compact('pelamar'))->render(),
        ];

        return response()->json($view);
    }

    public function edit($id) 
    {
        $pelamar = Pelamar::find($id);
        $view = [
            'data' => view('main.pelamar.edit', compact('pelamar'))->render()
        ];

        return response()->json($view);
    }

    public function dokumen($id)
    {
        $pelamar = Pelamar::find($id);
        $dokumen = json_decode($pelamar->documents);
        
        $data = array();
        foreach($dokumen as $key => $value) {
            if($value == 'empty') {
                array_push($data, 'Belum ada data yang di unggah');
                // $data[] += 'Belum di unggah';
            } else {
                array_push($data, asset($value));
                // $data[] += asset($value);
            }
        }
        // dd($data);
        return $data;
    }

    public function print()
    {
        $pelamar = Pelamar::all();

        $view = [
            'data' => view('main.pelamar.print', compact('pelamar'))->render(),
        ];

        return response()->json($view);
    }

    // public function update(PengumumanRequest $request)
    // {
    //     try {
    //         $pengumuman = pengumuman::find($request->id);
    //         $data = [
    //             'user_id' => Auth::guard('weboperator')->user()->id,
    //             'perihal' => $request->perihal,
    //             'deskripsi' => $request->deskripsi,
    //             'status' => $request->status
    //         ];

    //         $pengumuman->update($data);

    //         return response()->json([
    //             'status' => 'success',
    //             'message' => 'Data berhasil disimpan',
    //             'title' => 'Berhasil'
    //         ]);

    //     } catch (\Exception $e) {
    //         return response()->json([
    //             'status' => 'error',
    //             // 'message' => 'Something went wrong',
    //             'message' => 'Something went wrong',
    //             'title' => 'Failed'
    //         ]);
    //     }
    // }

}

