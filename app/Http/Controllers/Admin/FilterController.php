<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Department;
use App\Models\Jeniskegiatan;
use App\Models\Daftarkegiatan;
use App\Models\DaftarPendaftaran;
use App\Models\PresensiMahasiswa;
use App\Models\PresensiUmum;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;

class FilterController extends Controller
{

    public function index()
    {
        //
    }

    public function showFilterForm()
    {
        $departments = Department::all();
        $jeniskegiatan = Jeniskegiatan::all();
        $daftarkegiatans = Daftarkegiatan::all();

        return view('datapendaftar.filter', compact('departments', 'jeniskegiatan', 'daftarkegiatans'));
    }

    public function filter(Request $request)
    {

        // request daftarkegiatans_id
        $id_kegiatan = $request->daftarkegiatans_id;


        $query = DaftarPendaftaran::with('daftarkegiatan', 'user')
            ->where('daftarkegiatan_id', $id_kegiatan)
            ->latest()->get();

        return view('datapendaftar.incoming', compact('query'));
    }
}
