<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Lamaran;
use App\Models\Lowongan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
}
