<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\FinalInterview;
use App\Models\Lamaran;
use App\Models\Lowongan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $lowongan = Lowongan::where('status', true)->get();

        return view('main.dashboard.index', compact('lowongan'));
    }

    public function detailLowongan($id)
    {
        $lowongan = Lowongan::find($id);

        return response()->json($lowongan);
    }

    public function prosesLowongan(Request $request)
    {
        try {
            $lamaran = Lamaran::where('pelamar_id', Auth::user()->id)
                        ->where('lowongan_id', $request->lowongan_id)
                        ->where('posisi', $request->posisi)
                        ->first();
            if(!$lamaran) {
                Lamaran::create([
                    'pelamar_id' => Auth::user()->id,
                    'lowongan_id' => $request->lowongan_id,
                    'posisi' => $request->posisi,
                    'status' => null,
                ]);
                return response()->json([
                    'status' => 'success',
                    'message' => 'Data berhasil disimpan',
                    'title' => 'Berhasil'
                ]);
            } else {
                return response()->json([
                    'status' => 'info',
                    'message' => 'Anda sudah melamar pada posisi ini',
                    'title' => 'Gagal'
                ]);
            }

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage(),
                'title' => 'Failed'
            ]);
        }
    }

    // OPERATOR
    public function dashboard()
    {
        if(!Auth::guard('weboperator')->user()) {
            $lowongan = Lowongan::where('status', true)->get();

            return view('main.dashboard.index', compact('lowongan'));
        } else {
            return view('main.dashboard.manajer.index');
        }
    }

    public function chart(Request $request)
    {
        if($request->filter == 'kelulusan') {
            $kelulusan = DB::table('hasil_finalinterview')
                    ->select('hasil', DB::raw('count(*) as total'))
                    ->whereMonth('created_at', $request->bulan)
                    ->whereYear('created_at', $request->tahun)
                    ->groupBy('hasil')
                    ->get();
        } else {
            $lamaran = DB::table('lamaran')
                    ->select('status', DB::raw('count(*) as total'))
                    ->whereMonth('created_at', $request->bulan)
                    ->whereYear('created_at', $request->tahun)
                    ->groupBy('status')
                    ->get();
        }

        $view = [
            'data' => view('main.dashboard.manajer.chart')->with([
                'bulan' => bulan()[$request->bulan-1],
                'tahun' => $request->tahun,
                'kelulusan' => $kelulusan ?? null,
                'lamaran' => $lamaran ?? null,
                'filter' => $request->filter,
                'totalData' => $request->filter == 'kelulusan' ? count($kelulusan) : count($lamaran)
            ])->render()
        ];

        return response()->json($view);
    }
}
