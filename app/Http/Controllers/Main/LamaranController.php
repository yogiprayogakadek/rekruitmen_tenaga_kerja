<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Lamaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LamaranController extends Controller
{
    public function index()
    {
        if(Auth::guard('weboperator')) {
            return view('main.lamaran.index');
        } else {
            return view('pelamar.lamaran.index');
        }
    }

    public function render()
    {
        if(Auth::guard('weboperator')->user()) {
            $lamaran = Lamaran::all();
            $view = [
                'data' => view('main.lamaran.render', compact('lamaran'))->render()
            ];
            return response()->json($view);
        } else {
            $lamaran = Lamaran::with('lowongan', 'pelamar')->where('pelamar_id', Auth::user()->id)->get();
            // dd($lamaran);
            $view = [
                'data' => view('pelamar.lamaran.render', compact('lamaran'))->render()
            ];
            return response()->json($view);
        }
    }

    public function update(Request $request)
    {
        try {
            $lamaran = Lamaran::find($request->lamaran_id);
            $lamaran->update([
                'user_id' => Auth::guard('weboperator')->user()->id,
                'status' => $request->status,
                'keterangan' => $request->keterangan,
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Data berhasil diubah',
                'title' => 'Berhasil'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
                'title' => 'Gagal'
            ]);
        }
    }
}
