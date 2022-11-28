<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Http\Requests\JadwalRequest;
use App\Models\Jadwal;
use App\Models\Lamaran;
use App\Models\Pelamar;
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
        if(Auth::guard('weboperator')->user()) {
            $jadwal = Jadwal::all();
            $view = [
                'data' => view('main.jadwal.render', compact('jadwal'))->render()
            ];
            return response()->json($view);
        } else {
            $lamaran = Lamaran::where('pelamar_id', Auth::user()->id)->pluck('id')->toArray();
            $jadwal = Jadwal::with('lamaran.pelamar', 'lamaran.lowongan')->whereIn('lamaran_id', $lamaran)->paginate(2);
            $view = [
                'data' => view('main.jadwal.pelamar.index', compact('jadwal'))->render()
            ];
            return response()->json($view);
        }
    }

    public function create()
    {
        // $lamaran = Lamaran::with(['lowongan' => function($query) {
        //     $query->where('status', true);
        // }], 'pelamar')->where('status', true)->get();
        $jadwal = Jadwal::pluck('lamaran_id')->toArray();
        $lamaran = Lamaran::with(['lowongan' => function($query) {
            $query->where('status', true);
        }], 'pelamar')->whereNotIn('id', $jadwal)->where('status', true)->get();
        $view = [
            'data' => view('main.jadwal.create', compact('lamaran'))->render()
        ];

        return response()->json($view);
    }

    public function store(JadwalRequest $request)
    {
        try {
            $lamaran = Lamaran::find($request->lamaran);
            $jadwal = Jadwal::where('lamaran_id', $lamaran->id)->where('status', true)->first();
            if(!$jadwal) {
                if($lamaran->lowongan->status == true) {
                    $waktu = $request->jam . ':' . $request->menit;
                    Jadwal::create([
                        'user_id' => Auth::guard('weboperator')->user()->id,
                        'lamaran_id' => $lamaran->id,
                        'tanggal_prainterview' => $request->prainterview,
                        'lokasi_prainterview' => $request->lokasi,
                        'keterangan' => $request->keterangan,
                        'jam_prainterview' => $waktu
                    ]);
                    return response()->json([
                        'status' => 'success',
                        'message' => 'Data berhasil disimpan',
                        'title' => 'Berhasil'
                    ]);
                } else {
                    return response()->json([
                        'status' => 'error',
                        'message' => 'Data gagal dibuat dikarenakan lowongan sudah tidak aktif',
                        'title' => 'Gagal'
                    ]);
                }
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
        // $lamaran = Lamaran::with('pelamar', 'lowongan')->where('status', true)->get();
        $lamaran = Lamaran::with(['lowongan' => function($query) {
            $query->where('status', true);
        }], 'pelamar')->where('status', true)->get();
        $jadwal = Jadwal::find($id);
        $view = [
            'data' => view('main.jadwal.edit', compact('lamaran', 'jadwal'))->render()
        ];

        return response()->json($view);
    }

    public function update(JadwalRequest $request)
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

            $waktu_prainterview = $request->jam . ':' . $request->menit;
            $waktu_finalinterview = $request->jam_final . ':' . $request->menit_final;
            $jadwal->update([
                'user_id' => Auth::guard('weboperator')->user()->id,
                'lamaran_id' => $lamaran->id,
                'tanggal_prainterview' => $request->prainterview,
                'tanggal_finalinterview' => $request->finalinterview,
                'status' => $request->status,
                'keterangan' => $request->keterangan,

                'lokasi_prainterview' => $request->lokasi,
                'jam_prainterview' => $waktu_prainterview,
                'lokasi_finalinterview' => $request->lokasi_final,
                'jam_finalinterview' => $waktu_finalinterview,
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

    public function pelamar($id)
    {
        $pelamar = Pelamar::find($id);
        $view = [
            'data' => view('main.pelamar.dokumen', compact('pelamar'))->render()
        ];

        return response()->json($view);
    }
}
