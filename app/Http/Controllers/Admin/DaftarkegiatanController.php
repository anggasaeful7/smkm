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

class DaftarkegiatanController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
        $departments = Department::all();
        $senders = Sender::all();
        $jeniskegiatan = Jeniskegiatan::all();

        return view('kegiatan.create', [
            'departments' => $departments,
            'senders' => $senders,
            'jeniskegiatan' => $jeniskegiatan,
        ]);
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
            'letter_file' => 'required|mimes::jpeg,png,jpeg|file',
            'letter_type' => 'required',
            'batas' => 'required',
        ]);
        $redirect = 'daftar-kegiatan';

        if ($request->file('letter_file')) {
            $validatedData['letter_file'] = $request->file('letter_file')->store('letter-file', 'public');
        }

        if ($validatedData['letter_type'] == 'Daftar Kegiatan') {
            $redirect = 'daftar-kegiatan';
        }

        Daftarkegiatan::create($validatedData);

        return redirect()
            ->route($redirect)
            ->with('success', 'Sukses! 1 Data Berhasil Disimpan');
    }

    public function daftar_kegiatan()
    {
        if (request()->ajax()) {
            $query = Daftarkegiatan::with(['department', 'jeniskegiatan'])->where('letter_type', 'Daftar Kegiatan')->latest()->get();

            return Datatables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                        <a class="btn btn-success btn-xs" href="' . route('detail-kegiatan', $item->id) . '">
                            <i class="fa fa-search-plus"></i> &nbsp; Detail
                        </a>
                        <a class="btn btn-primary btn-xs" href="' . route('kegiatan.edit', $item->id) . '">
                            <i class="fas fa-edit"></i> &nbsp; Ubah
                        </a>
                        <form action="' . route('kegiatan.destroy', $item->id) . '" method="POST" onsubmit="return confirm(' . "'Anda akan menghapus item ini dari situs anda?'" . ')">
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

        return view('kegiatan.incoming');
    }

    public function daftar_kegiatan_umum()
    {
        $query = Daftarkegiatan::with(['department', 'jeniskegiatan'])->where('letter_type', 'Daftar Kegiatan')->latest()->get();

        return view('kegiatan.umum', [
            'query' => $query,
        ]);
    }

    public function outgoing_mail()
    {
        if (request()->ajax()) {
            $query = Daftarkegiatan::with(['department', 'sender', 'jeniskegiatan'])->where('letter_type', 'Daftar Kegiatan')->latest()->get();

            return Datatables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                        <a class="btn btn-success btn-xs" href="' . route('detail-kegiatan', $item->id) . '">
                            <i class="fa fa-search-plus"></i> &nbsp; Detail
                        </a>
                        <a class="btn btn-primary btn-xs" href="' . route('kegiatan.edit', $item->id) . '">
                            <i class="fas fa-edit"></i> &nbsp; Ubah
                        </a>
                       
                        <form action="' . route('kegiatan.destroy', $item->id) . '" method="POST" onsubmit="return confirm(' . "'Anda akan menghapus item ini dari situs anda?'" . ')">
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

        return view('kegiatan.outgoing');
    }

    public function show($id)
    {
        $item = Daftarkegiatan::with(['department', 'jeniskegiatan'])->findOrFail($id);

        return view('kegiatan.show', [
            'item' => $item,
        ]);
    }

    public function show_umum($id)
    {
        $item = Daftarkegiatan::with(['department', 'jeniskegiatan'])->findOrFail($id);

        return view('kegiatan.umum-show', [
            'item' => $item,
        ]);
    }

    public function edit($id)
    {
        $item = Daftarkegiatan::findOrFail($id);

        $departments = Department::all();
        $senders = Sender::all();
        $jeniskegiatan = Jeniskegiatan::all();

        return view('kegiatan.edit', [
            'departments' => $departments,
            'senders' => $senders,
            'jeniskegiatans' => $jeniskegiatan,
            'item' => $item,
        ]);
    }

    public function download_letter($id)
    {
        $item = Daftarkegiatan::findOrFail($id);

        return Storage::disk('public')->download($item->letter_file);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'tanggal_pelaksanaan' => 'required',
            'department_id' => 'required',
            'nama_kegiatan' => 'required',
            'jeniskegiatan_id' => 'required',
            'deskripsi' => 'required',
            'ruangan' => 'required',
            'letter_file' => 'mimes::jpeg,png,jpeg|file',
            'letter_type' => 'required',
        ]);

        $item = Daftarkegiatan::findOrFail($id);

        if ($request->file('letter_file')) {
            $validatedData['letter_file'] = $request->file('letter_file')->store('letter-file', 'public');
        }
        if ($validatedData['letter_type'] == 'Daftar Kegiatan') {
            $redirect = 'daftar-kegiatan';
        }

        $item->update($validatedData);

        return redirect()
            ->route($redirect)
            ->with('success', 'Sukses! 1 Data Berhasil Diubah');
    }

    public function destroy($id)
    {
        $item = Daftarkegiatan::findorFail($id);

        if ($item->letter_type == 'Daftar Kegiatan') {
            $redirect = 'daftar-kegiatan';
        } else {
            $redirect = 'daftar-kegiatan';
        }

        Storage::delete($item->letter_file);

        $item->delete();

        return redirect()
            ->route($redirect)
            ->with('success', 'Sukses! 1 Data Berhasil Dihapus');
    }
    public function cobaCetak()
    {
        return view('kegiatan.cetak-disposisi');
    }
}
