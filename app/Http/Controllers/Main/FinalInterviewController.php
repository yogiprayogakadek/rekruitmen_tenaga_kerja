<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\FinalInterview;
use App\Models\Jadwal;
use App\Models\Lamaran;
use App\Models\Pelamar;
use App\Models\PraInterview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FinalInterviewController extends Controller
{
    public function index()
    {
        if(Auth::guard('weboperator')) {
            return view('main.finalinterview.index');
        } else {
            return view('pelamar.finalinterview.index');
        }
    }

    public function render()
    {
        if(Auth::guard('weboperator')->user()) {
            $finalinterview = FinalInterview::with('jadwal.lamaran.pelamar', 'jadwal.lamaran.lowongan')->get();
            $view = [
                'data' => view('main.finalinterview.render', compact('finalinterview'))->render()
            ];
            return response()->json($view);
        } else {
            $lamaran = Lamaran::where('pelamar_id', Auth::user()->id)->pluck('id')->toArray();
            $jadwal = Jadwal::whereIn('lamaran_id', $lamaran)->pluck('id')->toArray();
            $finalinterview = FinalInterview::with(['jadwal' => function($query) use($lamaran) {
                $query->whereIn('lamaran_id', $lamaran);
            }])->whereIn('jadwal_id', $jadwal)->paginate(2);
            $view = [
                'data' => view('main.finalinterview.pelamar.index', compact('finalinterview'))->render()
            ];
            return response()->json($view);
        }
    }

    public function create()
    {
        $jadwal = Jadwal::whereNotNull('lokasi_finalinterview')->pluck('id')->toArray();
        $finalinterview = FinalInterview::whereIn('jadwal_id', $jadwal)->pluck('jadwal_id')->toArray();
        $prainterview = PraInterview::with('jadwal.lamaran.pelamar', 'jadwal.lamaran.lowongan')->whereNotIn('jadwal_id', $finalinterview)->where('hasil', 'lulus')->get();
        // $lamaran = Lamaran::with('pelamar', 'lowongan')->where('status', true)->get();
        $view = [
            'data' => view('main.finalinterview.create', compact('prainterview'))->render()
        ];

        return response()->json($view);
    }

    public function rekomendasiPosisi($id)
    {
        $jadwal = Jadwal::with('prainterview', 'lamaran')->where('id', $id)->first();
        $posisi = array();
        foreach(explode(', ', $jadwal->lamaran->lowongan->posisi) as $key => $value) {
            array_push($posisi, $value);
        }
        return response()->json([
            'jadwal' => $jadwal,
            'posisi' => $posisi
        ]);
    }

    public function store(Request $request)
    {
        try {
            // $jadwal = Jadwal::where('lamaran_id', $request->lamaran)->where('status', true)->first();
            $finalinterview = FinalInterview::where('jadwal_id', $request->jadwal)->first();
            if(!$finalinterview) {
                FinalInterview::create([
                    'user_id' => Auth::guard('weboperator')->user()->id,
                    'jadwal_id' => $request->jadwal,
                    'posisi' => $request->posisi,
                    'nama_penempatan' => $request->nama_penempatan,
                    'catatan' => $request->catatan,
                    'hasil' => $request->hasil,
                    'penempatan' => $request->penempatan,
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
        // $lamaran = Lamaran::with('pelamar', 'lowongan')->get();
        // $jadwal = Jadwal::find($id);
        $prainterview = PraInterview::with('jadwal.lamaran.pelamar', 'jadwal.lamaran.lowongan')->where('hasil', 'lulus')->get();
        $final = FinalInterview::with('jadwal.prainterview', 'jadwal.lamaran.lowongan')->where('id', $id)->first();
        // dd($final);
        $posisi = array();
        foreach(explode(', ', $final->jadwal->lamaran->lowongan->posisi) as $key => $value) {
            array_push($posisi, $value);
        }


        $view = [
            'data' => view('main.finalinterview.edit', compact('final', 'posisi', 'prainterview'))->render()
        ];

        return response()->json($view);
    }

    public function update(Request $request)
    {
        try {
            $final = FinalInterview::find($request->id);

            $final->update([
                'user_id' => Auth::guard('weboperator')->user()->id,
                // 'jadwal_id' => $request->jadwal,
                'posisi' => $request->posisi,
                'nama_penempatan' => $request->nama_penempatan,
                'catatan' => $request->catatan,
                'hasil' => $request->hasil,
                // 'status' => $request->status,
                'penempatan' => $request->penempatan,
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
        $finalinterview = FinalInterview::with('jadwal.lamaran.pelamar', 'jadwal.lamaran.lowongan')->get();
        $view = [
            'data' => view('main.finalinterview.print', compact('finalinterview'))->render()
        ];
        return response()->json($view);
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
