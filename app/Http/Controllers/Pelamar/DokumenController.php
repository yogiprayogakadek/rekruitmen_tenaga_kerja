<?php

namespace App\Http\Controllers\Pelamar;

use App\Http\Controllers\Controller;
use App\Models\Pelamar;
use Illuminate\Http\Request;

class DokumenController extends Controller
{
    public function index()
    {
        $pelamar = Pelamar::where('id', auth()->user()->id)->first();
        return view('pelamar.dokumen.index')->with([
            'pelamar' => $pelamar
        ]);
    }

    public function render()
    {
        $pelamar = Pelamar::where('id', auth()->user()->id)->first();
        $view = [
            'data' => view('pelamar.dokumen.render', compact('pelamar'))->render()
        ];
        return response()->json($view);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        try {
            $pelamar = Pelamar::find($request->pelamar_id);

            $filenamewithextension = $request->file('file')->getClientOriginalName();

            //get file extension
            $extension = $request->file('file')->getClientOriginalExtension();

            //filename to store
            $filenametostore = $pelamar->nama . '-' . $request->document . '-' . time() . '.' . $extension;
            $save_path = 'assets/uploads/media/documents';

            if(json_decode($pelamar->documents, true)[$request->document] != "empty") {
                unlink(json_decode($pelamar->documents, true)[$request->document]);
            }

            if (!file_exists($save_path)) {
                mkdir($save_path, 666, true);
            }
            
            $request->file('file')->move($save_path, $filenametostore);

            $newData = json_decode($pelamar->documents, true);
            $newData[$request->document] = $save_path . '/' . $filenametostore;
            
            $pelamar->documents = json_encode($newData);
            $pelamar->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Data berhasil disimpan',
                'title' => 'Berhasil',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
                'title' => 'Failed'
            ]);
        }
    }
}
