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
    //             'message' => 'Data saved successfully',
    //             'title' => 'Successfully'
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

