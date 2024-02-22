<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Department;
use App\Models\Jeniskegiatan;
use App\Models\Daftarkegiatan;
use App\Models\DaftarPendaftaran;
use App\Models\Sender;
use App\Models\Prodi;
use App\Models\Presensi;
use App\Models\PresensiMahasiswa;
use App\Models\Presensist;
use App\Models\PresensiUmum;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;

class PresensiController extends Controller
{
    public function mahasiswa($id)
    {
        $prodis = Prodi::all();
        return view('presensi.presensimahasiswa', [
            'prodis' => $prodis,
            'id' => $id,
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->all();

        if ($request->file('letter_file')) {
            $validatedData['letter_file'] = $request->file('letter_file')->store('letter-file', 'public');
        }

        Presensist::create($validatedData);

        return redirect()
            ->route('presensi-riwayat', $request->daftarkegiatan_id)
            ->with('success', 'Sukses! 1 Data Berhasil Disimpan');
    }


    public function umum($id)
    {
        return view('presensi.presensiumum', [
            'id' => $id,

        ]);
    }


    public function filter($id)
    {
        return view('presensi.filter', [
            'id' => $id,
        ]);
    }
    // public function store(Request $request)
    // {
    //     $validatedData = $request->validate([
    //         'tanggal_pelaksanaan' => 'required',
    //         'department_id' => 'required',
    //         'nama_kegiatan' => 'required',
    //         'jeniskegiatan_id' => 'required',
    //         'deskripsi' => 'required',
    //         'ruangan' => 'required',
    //         'letter_file' => 'required|mimes:pdf|file',
    //         'letter_type' => 'required',
    //     ]);
    //     $redirect = 'data-kegiatan';

    //     if ($request->file('letter_file')) {
    //         $validatedData['letter_file'] = $request->file('letter_file')->store('assets/letter-file');
    //     }

    //     if ($validatedData['letter_type'] == 'Daftar Kegiatan') {
    //         $redirect = 'data-kegiatan';
    //     }

    //     Daftarkegiatan::create($validatedData);

    //     return redirect()
    //         ->route($redirect)
    //         ->with('success', 'Sukses! 1 Data Berhasil Disimpan');
    // }

    public function data_presensi()
    {
        if (request()->ajax()) {
            $user_id = auth()->user()->id;
            $query = DaftarPendaftaran::with('daftarkegiatan', 'user', 'department', 'jeniskegiatan')->get();

            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                        <a class="btn btn-success btn-xs" href="' . route('presensi.filter', $item->id) . '">
                            <i class="fas fa-address-book"></i> &nbsp; Presensi
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

        return view('presensi.incoming');
    }

    public function data_presensi_umum()
    {
        if (request()->ajax()) {
            $user_id = auth()->user()->id;
            $query = DaftarPendaftaran::with('daftarkegiatan', 'user', 'department', 'jeniskegiatan')->where('user_id', $user_id)->get();

            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                       <a class="btn btn-success btn-xs" href="' . route('presensi.filter', $item->id) . '">
                         <i class="fas fa-address-book"></i> &nbsp; Presensi
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

        return view('presensi.incoming');
    }

    public function show($id)
    {
        $item = Daftarkegiatan::with(['department', 'jeniskegiatan'])->findOrFail($id);

        return view('presensi.filter', [
            'item' => $item,
        ]);
    }

    public function filtersemua()
    {
        return view('presensi.filtersemua');
    }

    public function riwayat()
    {
        if (request()->ajax()) {
            $user_id = auth()->user()->id;
            $query = Presensist::with('daftarkegiatan', 'prodi', 'user')->where('user_id', $user_id)->get();

            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                        <form action="' . route('presensi-riwayat.destroy', $item->id) . '" method="POST" onsubmit="return confirm(' . "'Anda akan menghapus item ini dari situs anda?'" . ')">
                            ' . method_field('delete') . csrf_field() . '
                            <button class="btn btn-danger btn-xs">
                                <i class="far fa-trash-alt"></i> &nbsp; Hapus
                            </button>
                        </form>
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
        return view('presensi.riwayat');
    }

    public function riwayat_all()
    {
        if (request()->ajax()) {
            $user_id = auth()->user()->id;
            $query = Presensist::with('daftarkegiatan', 'prodi', 'user')->get();

            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                        <form action="' . route('presensi-riwayat-all.destroy', $item->id) . '" method="POST" onsubmit="return confirm(' . "'Anda akan menghapus item ini dari situs anda?'" . ')">
                            ' . method_field('delete') . csrf_field() . '
                            <button class="btn btn-danger btn-xs">
                                <i class="far fa-trash-alt"></i> &nbsp; Hapus
                            </button>
                        </form>
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
        return view('presensi.riwayat');
    }

    public function destroy($id)
    {
        $item = Presensist::findOrFail($id);
        $item->delete();

        return redirect()->route('presensi-riwayat-all')->with('success', 'Sukses! 1 Data Berhasil Dihapus');
    }

    public function destroy_umum($id)
    {
        $item = Presensist::findOrFail($id);
        $item->delete();

        return redirect()->route('presensi-riwayat')->with('success', 'Sukses! 1 Data Berhasil Dihapus');
    }
}
