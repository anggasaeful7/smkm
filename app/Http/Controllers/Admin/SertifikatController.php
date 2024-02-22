<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Department;
use App\Models\Jeniskegiatan;
use App\Models\Daftarkegiatan;
use App\Models\Sender;
use App\Models\Prodi;
use App\Models\Presensi;

use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;

class SertifikatController extends Controller
{
    public function list_sertifikat()
    {
        if (request()->ajax()) {
            $query = Daftarkegiatan::with(['department', 'jeniskegiatan'])->where('letter_type', 'Daftar Kegiatan')->latest()->get();

            return Datatables::of($query)
                ->addColumn('sertifikat', function ($item) {
                    return '<a class="btn btn-success btn-xs btn-show-sertifikat" target="_blankss" href="' . $item->sertifikat . '">
                                <i class="fas fa-file"></i> &nbsp; Akses
                            </a>';
                })
                ->editColumn('post_status', function ($item) {
                    return $item->post_status == 'Published' ? '<div class="badge bg-green-soft text-green">' . $item->post_status . '</div>' : '<div class="badge bg-gray-200 text-dark">' . $item->post_status . '</div>';
                })
                ->addIndexColumn()
                ->removeColumn('id')
                ->rawColumns(['sertifikat', 'post_status'])
                ->make();
        }

        return view('downloadsertif.index');
    }

    public function list_kegiatan()
    {
        if (request()->ajax()) {
            $query = Daftarkegiatan::with(['department', 'jeniskegiatan'])->where('letter_type', 'Daftar Kegiatan')->latest()->get();

            return Datatables::of($query)
                ->addColumn('sertifikat', function ($item) {
                    return '<a href="' . route('sertifikat.submit', $item->id) . '" class="btn btn-primary btn-xs btn-show-sertifikat" data-id="' . $item->id . '">
                            <i class="fas fa-upload"></i> &nbsp; Submit
                        </a>';
                })


                ->editColumn('post_status', function ($item) {
                    return $item->post_status == 'Published' ? '<div class="badge bg-green-soft text-green">' . $item->post_status . '</div>' : '<div class="badge bg-gray-200 text-dark">' . $item->post_status . '</div>';
                })
                ->addIndexColumn()
                ->removeColumn('id')
                ->rawColumns(['action', 'sertifikat', 'post_status'])
                ->make();
        }

        return view('sertifikat.incoming');
    }
    public function submitsertif($id)
    {

        return view('sertifikat.submit', [
            'id' => $id,
        ]);
    }
    public function submitsertifpost(Request $request)
    {
        $sertifikat = $request->sertifikat;
        $id = $request->id;

        // Update daftarkegiatan sertifikat
        $daftarkegiatan = Daftarkegiatan::findOrFail($id);
        $daftarkegiatan->sertifikat = $sertifikat;
        $daftarkegiatan->save();

        return redirect()->route('data-sertifikat');
    }


    public function show($id)
    {
        $item = Daftarkegiatan::with(['department', 'jeniskegiatan'])->findOrFail($id);

        return view('presensi.filter', [
            'item' => $item,
        ]);
    }
}
