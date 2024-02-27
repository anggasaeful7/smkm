<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PrintController;
use App\Http\Controllers\Admin\LetterController;
use App\Http\Controllers\Admin\SenderController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\DisposisiController;
use App\Http\Controllers\Admin\LetteroutController;
use App\Http\Controllers\Admin\JeniskegiatanController;
use App\Http\Controllers\Admin\DaftarkegiatanController;
use App\Http\Controllers\Admin\DatapendaftaranController;
use App\Http\Controllers\Admin\JenisikutsertaController;
use App\Http\Controllers\Admin\FilterController;
use App\Http\Controllers\Admin\PendaftarController;
use App\Http\Controllers\Admin\PresensiController;
use App\Http\Controllers\Admin\ProdiController;
use App\Http\Controllers\Admin\SertifikatController;
use App\Http\Controllers\DaftarPendaftaranController;
use App\Models\Prodi;
use App\Models\Datapendaftar;
use App\Models\Filter;
use App\Models\Jenisikutserta;
use App\Models\Jeniskegiatan;
use App\Models\Department;
use App\Models\Daftarkegiatan;
use PhpParser\Node\Expr\Print_;

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


Route::get('/', [LoginController::class, 'index']);

// Authentication
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/register', [LoginController::class, 'store']);

// Admin
Route::prefix('admin')
    ->middleware('auth')
    ->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin-dashboard');
        //Department / department pengirim
        Route::resource('/department', DepartmentController::class);
        //Daftarkegiatan / daftarkegiatan pengirim
        Route::resource('/jeniskegiatan', JeniskegiatanController::class);
        //Jenisikutserta
        Route::resource('/jenisikutserta', JenisikutsertaController::class);
        //sender / pengirim pribadi
        Route::resource('/sender', SenderController::class);
        // daftarkegiatan / daftar-kegiatan
        Route::resource('/kegiatan', DaftarkegiatanController::class, ['except' => ['show']]);
        Route::get('kegiatan/daftar-kegiatan', [DaftarkegiatanController::class, 'daftar_kegiatan'])->name('daftar-kegiatan');
        Route::get('kegiatan/daftar-kegiatan-umum', [DaftarkegiatanController::class, 'daftar_kegiatan_umum'])->name('daftar-kegiatan-umum');
        Route::post('kegiatan/daftar-kegiatan-umum', [DaftarPendaftaranController::class, 'store'])->name('pendaftaran-kegiatan-umum');
        Route::get('kegiatan/kegiatan/{id}', [DaftarkegiatanController::class, 'show'])->name('detail-kegiatan');
        Route::get('kegiatan/kegiatan-umum/{id}', [DaftarkegiatanController::class, 'show_umum'])->name('detail-kegiatan-umum');
        Route::get('kegiatan/download/{id}', [DaftarkegiatanController::class, 'download_letter'])->name('download-flayer');
        Route::post('/daftarkegiatan', [DaftarkegiatanController::class, 'store'])->name('daftarkegiatan.store');
        Route::get('/daftarkegiatan/{id}', [DaftarkegiatanController::class, 'update'])->name('daftarkegiatan.update');
        // datapendaftaran
        Route::resource('/datapendaftaran', DatapendaftaranController::class, ['except' => ['show']]);
        Route::get('datapendaftaran/data-pendaftaran', [DaftarPendaftaranController::class, 'index'])->name('data-pendaftaran');
        Route::get('datapendaftaran/data-pendaftaran-umum', [DaftarPendaftaranController::class, 'index_umum'])->name('data-pendaftaran-umum');
        Route::delete('datapendaftaran/data-pendaftaran/{id}', [DaftarPendaftaranController::class, 'destroy'])->name('data-pendaftaran.destroy');
        Route::delete('datapendaftaran/data-pendaftaran-umum/{id}', [DaftarPendaftaranController::class, 'destroy_umum'])->name('data-pendaftaran-umum.destroy');
        Route::get('kegiatan/kegiatan/{id}', [DatapendaftaranController::class, 'show'])->name('detail-kegiatan');
        // letter / surat masuk
        Route::resource('/letter', LetterController::class, ['except' => ['show']]);
        Route::get('letter/surat-masuk', [LetterController::class, 'create'])->name('surat-masuk');
        Route::get('letter/surat/{id}', [LetterController::class, 'show'])->name('detail-surat');
        Route::get('letter/download/{id}', [LetterController::class, 'download_letter'])->name('download-surat');
        // letterout / surat keluar
        Route::resource('/letterout', LetteroutController::class, ['except' => ['show']]);
        Route::get('letterout/surat-keluar', [LetteroutController::class, 'outgoing_mail'])->name('surat-keluar');
        Route::get('letterout/surat/{id}', [LetteroutController::class, 'show'])->name('detail-surat-keluar');
        Route::get('disposisi/surat-disposisi/{id}', [DisposisiController::class, 'disposisiprint'])->name('disposisi-surat');
        Route::get('letterout/download/{id}', [LetteroutController::class, 'download_letter'])->name('download-surat-keluar');
        // disposisi / pengajuan disposisi
        Route::resource('/disposisi', DisposisiController::class, ['except' => ['show']]);
        Route::get('disposisi/surat-disposisi', [DisposisiController::class, 'disposisi_form'])->name('surat-disposisi');
        Route::get('disposisi/surat-disposisi/{id}', [DisposisiController::class, 'create'])->name('periksa-disposisi');
        Route::get('disposisi/surat/{id}', [DisposisiController::class, 'show'])->name('detail-disposisi');
        //print
        Route::get('print/surat-masuk', [PrintController::class, 'index'])->name('print-surat-masuk');
        Route::get('print/surat-keluar', [PrintController::class, 'outgoing'])->name('print-surat-keluar');
        Route::get('print/surat-disposisi', [PrintController::class, 'disposisiprintall'])->name('print-surat-disposisi');
        // user dan setting
        Route::resource('user', UserController::class);
        Route::resource('setting', SettingController::class, ['except' => ['show']]);
        Route::get('setting/password', [SettingController::class, 'change_password'])->name('change-password');
        Route::post('setting/upload-profile', [SettingController::class, 'upload_profile'])->name('profile-upload');
        Route::post('change-password', [SettingController::class, 'update_password'])->name('update.password');

        //Filter
        Route::get('/filter-kegiatan', [FilterController::class, 'showFilterForm'])->name('filter.form');
        Route::post('/filter-kegiatan', [FilterController::class, 'filter'])->name('filter.kegiatan');
        
        //datapendaftar / listpendaftar
        // Route::resource('/datapendaftar', PendaftarController::class, ['except' => ['show']]);
        // Route::get('datapendaftar/data-pendaftar', [PendaftarController::class, 'data_pendaftar'])->name('data-pendaftar');
        // Route::get('datapendaftar/incoming', [PendaftarController::class, 'data_pendaftar'])->name('datapendaftar.incoming');

        //Presensi
        Route::resource('/presensi', PresensiController::class, ['except' => ['show']]);
        Route::get('presensi/data-kegiatan', [PresensiController::class, 'data_presensi'])->name('data-kegiatan');
        Route::get('presensi/riwayat', [PresensiController::class, 'riwayat'])->name('presensi-riwayat');
        Route::delete('presensi/riwayat/{id}', [PresensiController::class, 'destroy_umum'])->name('presensi-riwayat.destroy');
        Route::get('presensi/riwayat/all', [PresensiController::class, 'riwayat_all'])->name('presensi-riwayat-all');
        Route::delete('presensi/riwayat/all/{id}', [PresensiController::class, 'destroy'])->name('presensi-riwayat-all.destroy');
        Route::get('presensi/filter/{id}', [PresensiController::class, 'filter'])->name('presensi.filter');
        Route::get('presensi/presensimahasiswa/{id}', [PresensiController::class, 'mahasiswa'])->name('presensi.presensimahasiswa');
        Route::get('presensi/presensiumum/{id}', [PresensiController::class, 'umum'])->name('presensi.presensiumum');
        Route::get('presensi/filtersemua', [PresensiController::class, 'filtersemua'])->name('filter-semua');
        Route::post('presensi/mahasiswa/submit', [PresensiController::class, 'store'])->name('presensimahasiswa.submit');
        Route::post('presensi/umum/submit', [PresensiController::class, 'store'])->name('presensiumum.submit');

        //sertifikat
        Route::resource('/sertifikat', SertifikatController::class, ['except' => ['show']]);
        Route::get('sertifikat/data-kegiatan', [SertifikatController::class, 'list_kegiatan'])->name('data-sertifikat');
        Route::get('sertifikat/submit/{id}', [SertifikatController::class, 'submitsertif'])->name('sertifikat.submit');
        Route::post('sertifikat/submit', [SertifikatController::class, 'submitsertifpost'])->name('sertifikat.store');
        Route::get('downloadsertif/index', [SertifikatController::class, 'list_sertifikat'])->name('sertifikat');
        //Prodi
        Route::resource('/prodi', ProdiController::class);
    });
