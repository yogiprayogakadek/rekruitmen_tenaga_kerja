<?php

use App\Http\Controllers\Main\PengumumanController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('dashboard.index');
// });

Route::middleware('isLoggedInPelamar')->group(function() {
    Route::get('/', 'Main\DashboardController@index');
    Route::get('/detail-lowongan/{id}', 'Main\DashboardController@detailLowongan');
    Route::post('/proses-lamaran', 'Main\DashboardController@prosesLowongan');

    Route::namespace('Pelamar')->group(function() {
        // Dokumen Controller
        Route::controller(DokumenController::class)
            ->prefix('dokumen')
            ->as('dokumen.')
            ->group(function() {
                Route::get('', 'index')->name('index');
                Route::get('/render', 'render')->name('render');
                Route::get('/create', 'create')->name('create');
                Route::get('/edit/{id}', 'edit')->name('edit');
                Route::post('/store', 'store')->name('store');
                Route::post('/update', 'update')->name('update');
        });
    });
});

Route::middleware('isLoggedInOperator')->group(function() {
    // Route::get('/dashboard', function() {
    //     return view('main.dashboard.index');
    // })->name('dashboard');

    // Route::get('/dashboard', 'Main\DashboardController@index')->name('dashboard');

    Route::namespace('Main')->group(function() {

        // Dashboard Controller
        Route::controller(DashboardController::class)
            ->prefix('dashboard')
            ->as('dashboard.')
            ->group(function() {
                Route::get('', 'dashboard')->name('index');
                Route::post('/chart', 'chart')->name('chart');
            });


        // Petugas Controller
        Route::controller(PetugasController::class)
            ->prefix('petugas')
            ->as('petugas.')
            ->group(function() {
                Route::get('', 'index')->name('index');
                Route::get('/render', 'render')->name('render');
                Route::get('/create', 'create')->name('create');
                Route::get('/edit/{id}', 'edit')->name('edit');
                Route::post('/store', 'store')->name('store');
                Route::post('/update', 'update')->name('update');
            });

        // Lowongan Controller
        Route::controller(LowonganController::class)
            ->prefix('lowongan')
            ->as('lowongan.')
            ->group(function() {
                Route::get('', 'index')->name('index');
                Route::get('/render', 'render')->name('render');
                Route::get('/create', 'create')->name('create');
                Route::get('/edit/{id}', 'edit')->name('edit');
                Route::get('/print', 'print')->name('print');
                Route::post('/store', 'store')->name('store');
                Route::post('/update', 'update')->name('update');
            });

            // Pelamar Controller
            Route::controller(PelamarController::class)
            ->prefix('pelamar')
            ->as('pelamar.')
            ->group(function() {
                Route::get('', 'index')->name('index');
                Route::get('/render', 'render')->name('render');
                Route::get('/create', 'create')->name('create');
                Route::get('/edit/{id}', 'edit')->name('edit');
                Route::get('/dokumen/{id}', 'dokumen')->name('dokumen');
                Route::get('/print', 'print')->name('print');
                Route::post('/store', 'store')->name('store');
                Route::post('/update', 'update')->name('update');
        });

    });
});

Route::namespace('Main')->middleware('guest:web,weboperator')->group(function() {
    Route::controller(CpanelController::class)
        ->prefix('cpanel')
        ->as('cpanel.')
        ->group(function(){
            Route::get('', 'index')->name('index');
            Route::post('/login', 'handleLogin')->name('login');
            Route::get('/logout', 'logout')->name('logout');
    });

    // Registration Route
    Route::controller(RegistrationController::class)
        ->prefix('registration')
        ->as('registration.')
        ->group(function(){
            Route::get('', 'index')->name('index');
            Route::post('/store', 'store')->name('store');
    });
});

Route::namespace('Main')->middleware('auth:web,weboperator')->group(function() {
    // Lamaran Controller
    Route::controller(LamaranController::class)
        ->prefix('lamaran')
        ->as('lamaran.')
        ->group(function() {
            Route::get('', 'index')->name('index');
            Route::get('/render', 'render')->name('render');
            Route::post('/update', 'update')->name('update');
            Route::get('/print', 'print')->name('print');

            Route::get('/pelamar/{id}', 'pelamar')->name('pelamar');
    });

    // Jadwal Controller
    Route::controller(JadwalController::class)
        ->prefix('jadwal')
        ->as('jadwal.')
        ->group(function() {
            Route::get('', 'index')->name('index');
            Route::get('/render', 'render')->name('render');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::post('/update', 'update')->name('update');

            Route::get('/pelamar/{id}', 'pelamar')->name('pelamar');
    });

    // Pra Interview Controller
    Route::controller(PraInterviewController::class)
        ->prefix('prainterview')
        ->as('prainterview.')
        ->group(function() {
            Route::get('', 'index')->name('index');
            Route::get('/render', 'render')->name('render');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::get('/print', 'print')->name('print');
            Route::get('/daftar-posisi-lowongan/{id}', 'daftarPosisi')->name('daftar.posisi');
            Route::post('/update', 'update')->name('update');

            Route::get('/pelamar/{id}', 'pelamar')->name('pelamar');
    });

    // Final Interview Controller
    Route::controller(FinalInterviewController::class)
        ->prefix('finalinterview')
        ->as('finalinterview.')
        ->group(function() {
            Route::get('', 'index')->name('index');
            Route::get('/render', 'render')->name('render');
            Route::get('/create', 'create')->name('create');
            Route::post('/store', 'store')->name('store');
            Route::get('/edit/{id}', 'edit')->name('edit');
            Route::get('/print', 'print')->name('print');
            Route::get('/rekomendasi-posisi/{id}', 'rekomendasiPosisi')->name('rekomendasi.posisi');
            Route::post('/update', 'update')->name('update');

            Route::get('/pelamar/{id}', 'pelamar')->name('pelamar');
    });

    // Pengumuman Controller
    Route::controller(PengumumanController::class)
    ->prefix('pengumuman')
    ->as('pengumuman.')
    ->group(function() {
        Route::get('', 'index')->name('index');
        Route::get('/render', 'render')->name('render');
        Route::get('/create', 'create')->name('create');
        Route::get('/edit/{id}', 'edit')->name('edit');
        Route::post('/store', 'store')->name('store');
        Route::post('/update', 'update')->name('update');
});
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
