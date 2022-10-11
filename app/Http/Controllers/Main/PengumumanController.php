<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Http\Requests\PengumumanRequest;
use App\Models\Pengumuman;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    public function index()
    {
        return view('main.pengumuman.index');
    }

    public function render()
    {
        $pengumuman = Pengumuman::all();

        $view = [
            'data' => view('main.pengumuman.render', compact('pengumuman'))->render(),
        ];

        return response()->json($view);
    }

    public function create()
    {
        $view = [
            'data' => view('main.pengumuman.create')->render(),
        ];

        return response()->json($view);
    }

    public function store(PengumumanRequest $request)
    {
        try {
            $data = [
                'user_id' => auth()->user()->id,
                'perihal' => $request->perihal,
                'deskripsi' => $request->deskripsi,
                'status' => true
            ];

            Pengumuman::create($data);

            return response()->json([
                'status' => 'success',
                'message' => 'Data saved successfully',
                'title' => 'Successfully'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Something went wrong',
                'title' => 'Failed'
            ]);
        }
    }

    public function edit($id) 
    {
        $pengumuman = Pengumuman::find($id);
        $view = [
            'data' => view('main.pengumuman.edit', compact('pengumuman'))->render()
        ];

        return response()->json($view);
    }

    public function update(PengumumanRequest $request)
    {
        try {
            $pengumuman = pengumuman::find($request->id);
            $data = [
                'user_id' => auth()->user()->id,
                'perihal' => $request->perihal,
                'deskripsi' => $request->deskripsi,
                'status' => $request->status
            ];

            $pengumuman->update($data);

            return response()->json([
                'status' => 'success',
                'message' => 'Data saved successfully',
                'title' => 'Successfully'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                // 'message' => 'Something went wrong',
                'message' => 'Something went wrong',
                'title' => 'Failed'
            ]);
        }
    }


    // public function detail($id) 
    // {
    //     $announcement = Announcement::find($id);
    //     $data = [
    //         'title' => $announcement->title,
    //         'more' => $announcement->description,
    //         'less' => strlen($announcement->description > 50) ? substr($announcement->description,0,50) . "..." : $announcement->description
    //     ];
    //     return response()->json($data);
    // }
}
