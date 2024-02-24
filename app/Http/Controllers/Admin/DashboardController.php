<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Disposisi;
use Illuminate\Http\Request;

use App\Models\Letter;
use App\Models\Letterout;

class DashboardController extends Controller
{
    public function index()
    {

        // Cek role jika role == umum dan role == ormawa maka di direct ke daftar-kegiatan-umum
        if (auth()->user()->role == 'umum' || auth()->user()->role == 'ormawa') {
            return redirect()->route('daftar-kegiatan-umum');
        } else {
            $masuk = Letter::where('letter_type', 'Surat Masuk')->get()->count();
            $keluar = Letterout::where('letter_type', 'Surat Keluar')->get()->count();
            $disposisi = Disposisi::get()->count();

            return view('pages.admin.dashboard', [
                'masuk' => $masuk,
                'keluar' => $keluar,
                'disposisi' => $disposisi
            ]);
        }
    }
}
