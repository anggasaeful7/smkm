<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Department;
use App\Models\Jeniskegiatan;
use App\Models\Daftarkegiatan;
use App\Models\Sender;

use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;

class DatapendaftaranController extends Controller
{

    public function index()
    {
        //
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'tanggal_pelaksanaan' => 'required',
            'department_id' => 'required',
            'nama_kegiatan' => 'required',
            'jeniskegiatan_id' => 'required',
            'deskripsi' => 'required',
            'ruangan' => 'required',
            'letter_file' => 'required|mimes:pdf|file',
            'letter_type' => 'required',
        ]);
        $redirect = 'data-pendaftaran';

        if ($request->file('letter_file')) {
            $validatedData['letter_file'] = $request->file('letter_file')->store('letter-file', 'public');
        }

        if ($validatedData['letter_type'] == 'Daftar Kegiatan') {
            $redirect = 'data-pendaftaran';
        }

        Daftarkegiatan::create($validatedData);

        return redirect()
            ->route($redirect)
            ->with('success', 'Sukses! 1 Data Berhasil Disimpan');
    }

    public function data_pendaftaran()
    {
        if (request()->ajax()) {
            $query = Daftarkegiatan::with(['department', 'jeniskegiatan'])->where('letter_type', 'Daftar Kegiatan')->latest()->get();

            return Datatables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                        <a class="btn btn-success btn-xs" href="' . route('detail-kegiatan', $item->id) . '">
                            <i class="fa fa-search-plus"></i> &nbsp; Detail
                        </a>
                    ';
                })
                ->editColumn('post_status', function ($item) {
                    return $item->post_status == 'Published' ? '<div class="badge bg-green-soft text-green">' . $item->post_status . '</div>' : '<div class="badge bg-gray-200 text-dark">' . $item->post_status . '</div>';
                })
                ->addIndexColumn()
                ->removeColumn('id')
                ->rawColumns(['action', 'post_status'])
                ->make();
        }

        return view('datapendaftaran.incoming');
    }


    public function show($id)
    {
        $item = Daftarkegiatan::with(['department', 'jeniskegiatan'])->findOrFail($id);

        return view('datapendaftaran.show', [
            'item' => $item,
        ]);
    }


    public function download_letter($id)
    {
        $item = Daftarkegiatan::findOrFail($id);

        return Storage::download($item->letter_file);
    }


    public function cobaCetak()
    {
        return view('kegiatan.cetak-disposisi');
    }
}
