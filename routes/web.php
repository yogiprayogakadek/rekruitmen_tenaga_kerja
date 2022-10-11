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
    Route::get('/', function() {
        return view('main.dashboard.index');
    });
});

Route::middleware('isLoggedInOperator')->group(function() {
    Route::get('/dashboard', function() {
        return view('main.dashboard.index');
    })->name('dashboard');

    Route::namespace('Main')->group(function() {

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

        // Lowongan Controller
        Route::controller(LowonganController::class)
            ->prefix('lowongan')
            ->as('lowongan.')
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

Route::namespace('Main')->middleware('guest')->group(function() {
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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
