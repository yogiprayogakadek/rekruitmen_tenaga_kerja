<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CpanelController extends Controller
{
    public function index()
    {
        return view('auth.cpanel.login');
    }

    public function handleLogin(Request $req)
    {
        if(Auth::guard('weboperator')->attempt($req->only(['username', 'password'])))
        {
            if(Auth::guard('weboperator')->user()->status == false) {
                Auth::guard('weboperator')->logout();
                return redirect()->route('cpanel.index')->with([
                    'status' => 'error',
                    'message' => 'Anda sudah tidak aktif'
                ]);
            }
            return redirect()->route('dashboard');
        }

        return redirect()
            ->back()
            ->with('error', 'Invalid Credentials');
    }

    public function logout()
    {
        Auth::guard('weboperator')
            ->logout();

        return redirect()
            ->route('cpanel.index');
    }
}
