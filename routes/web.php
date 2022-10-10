<?php

use App\Http\Controllers\DataPelabuhanController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PelabuhanController;
use App\Http\Controllers\TerminalController;
use App\Models\Pendataanbis;
use App\Models\Pendataanpelabuhan;
use App\Models\Terminal;
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

Route::get('/', function () {
    return view('index', [
        'title' => 'Home',
        'terminals' => Terminal::all(),
        'inputdata' => Pendataanbis::all()
    ]);
});

// ROUTE TERMINAL
Route::get('/inputdata', [HomeController::class, 'index']);
Route::get('/data_input', [HomeController::class, 'json']);
Route::get('/rekapdata', [HomeController::class, 'rekap']);
Route::post('/savedata', [HomeController::class, 'store']);

Route::resource('/terminals', TerminalController::class);
Route::get('/data_terminal', [TerminalController::class, 'json']);

// ROUTE PELABUHAN
Route::resource('/pelabuhans', DataPelabuhanController::class);
Route::get('/data_pelabuhan', [DataPelabuhanController::class, 'json']);

Route::get('/inputpelabuhan', [PelabuhanController::class, 'create']);
Route::get('/data_input_pelabuhan', [PelabuhanController::class, 'json']);
Route::get('/datapelabuhan/{id}', [PelabuhanController::class, 'index']);
Route::post('/savedatapelabuhan', [PelabuhanController::class, 'store']);
