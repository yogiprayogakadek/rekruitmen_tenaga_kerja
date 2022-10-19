<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Jadwal;
use App\Models\Lamaran;
use App\Models\PraInterview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JadwalController extends Controller
{
    public function index()
    {
        if(Auth::guard('weboperator')) {
            return view('main.jadwal.index');
        } else {
            return view('pelamar.jadwal.index');
        }
    }

    public function render()
    {
        if(Auth::guard('weboperator')) {
            $jadwal = Jadwal::all();
            $view = [
                'data' => view('main.jadwal.render', compact('jadwal'))->render()
            ];
            return response()->json($view);
        } else {
            $jadwal = Jadwal::with('lamaran.pelamar')->where('pelamar_id', Auth::user()->id)->get();
            $view = [
                'data' => view('pelamar.jadwa$jadwal.render', compact('jadwa$jadwal'))->render()
            ];
            return response()->json($view);
        }
    }

    public function create()
    {
        $lamaran = Lamaran::with('pelamar', 'lowongan')->where('status', true)->get();
        $view = [
            'data' => view('main.jadwal.create', compact('lamaran'))->render()
        ];

        return response()->json($view);
    }

    public function store(Request $request)
    {
        try {
            $lamaran = Lamaran::find($request->lamaran);
            $jadwal = Jadwal::where('lamaran_id', $lamaran->id)->where('status', true)->first();
            if(!$jadwal) {
                Jadwal::create([
                    'user_id' => Auth::guard('weboperator')->user()->id,
                    'lamaran_id' => $lamaran->id,
                    'tanggal_prainterview' => $request->prainterview
                ]);
                return response()->json([
                    'status' => 'success',
                    'message' => 'Data berhasil disimpan',
                    'title' => 'Berhasil'
                ]);
            } else {
                return response()->json([
                    'status' => 'info',
                    'message' => 'Data gagal disimpan dikarenakan masih ada jadwal untuk lamaran ini',
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
        $lamaran = Lamaran::with('pelamar', 'lowongan')->get();
        $jadwal = Jadwal::find($id);
        $view = [
            'data' => view('main.jadwal.edit', compact('lamaran', 'jadwal'))->render()
        ];

        return response()->json($view);
    }

    public function update(Request $request)
    {
        try {
            $jadwal = Jadwal::find($request->jadwal_id);
            $lamaran = Lamaran::find($request->lamaran);
            $pra = PraInterview::where('jadwal_id', $jadwal->id)->where('hasil', 'lulus')->first();
            if($request->finalinterview != null) {
                if(!$pra) {
                    return response()->json([
                        'status' => 'info',
                        'message' => 'Jadwal tidak dapat dibuat karena hasil pra interview belum ada atau tidak lolos',
                        'title' => 'Gagal'
                    ]);
                }
            }

            $jadwal->update([
                'user_id' => Auth::guard('weboperator')->user()->id,
                'lamaran_id' => $lamaran->id,
                'tanggal_prainterview' => $request->prainterview,
                'tanggal_finalinterview' => $request->finalinterview,
                'status' => $request->status
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
}
