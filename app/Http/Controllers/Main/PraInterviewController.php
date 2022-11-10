<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use App\Models\Lamaran;
use App\Models\PraInterview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PraInterviewController extends Controller
{
    public function index()
    {
        if(Auth::guard('weboperator')) {
            return view('main.prainterview.index');
        } else {
            return view('pelamar.prainterview.index');
        }
    }

    public function render()
    {
        if(Auth::guard('weboperator')) {
            $prainterview = PraInterview::with('jadwal.lamaran.pelamar', 'jadwal.lamaran.lowongan')->get();
            $view = [
                'data' => view('main.prainterview.render', compact('prainterview'))->render()
            ];
            return response()->json($view);
        } else {
            $lamaran = Lamaran::where('pelamar_id', Auth::user()->id)->pluck('id')->toArray();
            $prainterview = PraInterview::with(['jadwal' => function($query) use($lamaran) {
                $query->whereIn('pelamar_id', $lamaran);
            }])->get();
            $view = [
                'data' => view('pelamar.prainterview.render', compact('prainterview'))->render()
            ];
            return response()->json($view);
        }
    }

    public function create()
    {
        $lamaran = Lamaran::with('pelamar', 'lowongan')->where('status', true)->get();
        $view = [
            'data' => view('main.prainterview.create', compact('lamaran'))->render()
        ];

        return response()->json($view);
    }

    public function daftarPosisi($id)
    {
        $lamaran = Lamaran::with('lowongan')->where('id', $id)->first();
        $posisi = array();
        foreach(explode(', ', $lamaran->lowongan->posisi) as $key => $value) {
            array_push($posisi, $value);
        }
        return response()->json($posisi);
    }

    public function store(Request $request)
    {
        try {
            $jadwal = Jadwal::where('lamaran_id', $request->lamaran)->where('status', true)->first();
            $prainterview = PraInterview::where('jadwal_id', $jadwal->id)->first();
            if(!$prainterview) {
                PraInterview::create([
                    'user_id' => Auth::guard('weboperator')->user()->id,
                    'jadwal_id' => $jadwal->id,
                    'rekomendasi' => $request->rekomendasi,
                    'grade' => $request->grade,
                    'catatan' => $request->catatan,
                    'hasil' => $request->hasil,
                ]);
                return response()->json([
                    'status' => 'success',
                    'message' => 'Data berhasil disimpan',
                    'title' => 'Berhasil'
                ]);
            } else {
                return response()->json([
                    'status' => 'info',
                    'message' => 'Data gagal disimpan dikarenakan hasil sudah ada',
                    'title' => 'Gagal'
                ]);
            }

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
                'title' => 'Gagal'
            ]);
        }
    }

    public function edit($id)
    {
        $lamaran = Lamaran::with('pelamar', 'lowongan')->where('status', true)->get();
        // $jadwal = Jadwal::find($id);
        $prainterview = PraInterview::find($id);
        $view = [
            'data' => view('main.prainterview.edit', compact('lamaran', 'prainterview'))->render()
        ];

        return response()->json($view);
    }

    public function update(Request $request)
    {
        try {
            $pra = PraInterview::where('id', $request->prainterview_id)->first();
            if($request->lamaran != $pra->jadwal->lamaran_id) {
                $jadwal = Jadwal::where('lamaran_id', $request->lamaran)->first();
                $cek = PraInterview::where('jadwal_id', $jadwal->id)->where('status', true)->first();
                if(!$cek) {
                    return response()->json([
                        'status' => 'error',
                        'message' => 'Data gagal disimpan',
                        'title' => 'Gagal'
                    ]);
                }
            }
            $pra->update([
                'user_id' => Auth::guard('weboperator')->user()->id,
                'jadwal_id' => $pra->jadwal_id,
                'rekomendasi' => $request->rekomendasi,
                'grade' => $request->grade,
                'catatan' => $request->catatan,
                'hasil' => $request->hasil,
            ]);
            return response()->json([
                'status' => 'success',
                'message' => 'Data berhasil disimpan',
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

    public function print()
    {
        $prainterview = PraInterview::with('jadwal.lamaran.pelamar', 'jadwal.lamaran.lowongan')->get();
        $view = [
            'data' => view('main.prainterview.print', compact('prainterview'))->render()
        ];
        return response()->json($view);
    }
}