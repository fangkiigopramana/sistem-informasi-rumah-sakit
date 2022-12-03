<?php

use App\Models\Pasien;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataRekamMedisController;
use App\Models\DataRekamMedis;
use Illuminate\Support\Facades\DB;

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

Route::get('/', [DashboardController::class, 'show'])->middleware('auth');

//Cetak Laporan
Route::get('/data-pasien/cetak', [PasienController::class, 'print'])->middleware('auth');
Route::get('/data-dokter/cetak', [DokterController::class, 'print'])->middleware('auth');
Route::get('/rekam-medis/cetak', [DataRekamMedisController::class, 'print'])->middleware('auth');

// CRUD Data Pasien
Route::resource('/data-pasien', PasienController::class)->except([
    'show', 'edit', 'update', 'destroy',
])->middleware('auth');
Route::controller(PasienController::class)->group(function () {
    Route::get('/data-pasien/{pasien:pasien_id}', 'show')->middleware('auth');
    Route::get('/data-pasien/{pasien:pasien_id}/edit', 'edit')->middleware('auth');
    Route::put('/data-pasien/{pasien:pasien_id}', 'update')->middleware('auth');
    Route::delete('/data-pasien/{pasien:pasien_id}', 'destroy')->middleware('auth');
});
// CRUD Data Dokter
Route::resource('/data-dokter', DokterController::class)->except([
    'show', 'edit', 'update', 'destroy'
])->middleware('auth');
Route::controller(DokterController::class)->group(function () {
    Route::get('/data-dokter/{dokter:dokter_id}', 'show')->middleware('auth');
    Route::get('/data-dokter/{dokter:dokter_id}/edit', 'edit')->middleware('auth');
    Route::put('/data-dokter/{dokter:dokter_id}', 'update')->middleware('auth');
    Route::delete('/data-dokter/{dokter:dokter_id}', 'destroy')->middleware('auth');
});


Route::controller(DataRekamMedisController::class)->group(function () {
    Route::get('/rekam-medis', 'index')->middleware('auth');
    Route::get('/rekam-medis/create', 'create')->middleware('auth');
    Route::post('/rekam-medis', 'store')->middleware('auth');
    Route::get('/rekam-medis/trashed', 'trashed')->middleware('auth');
    Route::get('/rekam-medis/{dataRekamMedis:id}', 'show')->middleware('auth');
    Route::get('/rekam-medis/edit/{dataRekamMedis:id}', 'edit')->middleware('auth');
    Route::post('/rekam-medis/{dataRekamMedis:id}', 'update')->middleware('auth');
    Route::delete('/rekam-medis/hapus-sementara/{dataRekamMedis:id}', 'softDelete')->middleware('auth');
    Route::delete('/rekam-medis/hapus-permanen/{dataRekamMedis:id}', 'hardDelete')->middleware('auth');
    Route::delete('/rekam-medis/restore/{dataRekamMedis:id}', 'restore')->middleware('auth');
});

//login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

//register
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);


// Data Rekam Medis
// Route::get('/rekam-medis/trashed', function () {
//     return view('informasi-medis.rekam-medis.index',[
//         'rekamMedis' => DataRekamMedis::onlyTrashed()->get()
//     ]);
// });

// Route::resource('/rekam-medis', DataRekamMedisController::class)->except([
    //     'show', 'edit', 'update', 'destroy', 'trashed'
    // ])->middleware('auth');


// testing hardDelete
// Route::delete('/rekam-medis/hapus-permanen/{dataRekamMedis:id}', function ($id)
//     {
//         // dd($id);
      
//         DB::delete('delete from data_rekam_medis where id = ?',[
//             $id
//         ]);
//         dd('berhasil dihapus gan');
//         // DataRekamMedis::destroy($dataRekamMedis->id);

//         return redirect('/rekam-medis')->with('success', 'Yee, Data rekam medis berhasil dihapus!');
//     }
// )->middleware('auth');
