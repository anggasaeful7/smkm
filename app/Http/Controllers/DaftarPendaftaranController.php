<?php

namespace App\Http\Controllers;

use App\Models\DaftarPendaftaran;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DaftarPendaftaranController extends Controller
{
    public function index()
    {


        if (request()->ajax()) {
            $query = DaftarPendaftaran::with('daftarkegiatan', 'user', 'department', 'jeniskegiatan')->get();

            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                    <form action="' . route('data-pendaftaran.destroy', $item->id) . '" method="POST" onsubmit="return confirm(' . "'Anda akan menghapus item ini dari situs anda?'" . ')">
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

        return view('datapendaftaran.incoming');
    }

    public function index_umum()
    {


        if (request()->ajax()) {
            $user_id = auth()->user()->id;
            $query = DaftarPendaftaran::with('daftarkegiatan', 'user', 'department', 'jeniskegiatan')->where('user_id', $user_id)->get();

            return DataTables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                        <form action="' . route('data-pendaftaran-umum.destroy', $item->id) . '" method="POST" onsubmit="return confirm(' . "'Anda akan menghapus item ini dari situs anda?'" . ')">
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

        return view('datapendaftaran.incoming');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        DaftarPendaftaran::create($data);

        return redirect()->route('data-pendaftaran-umum');
    }

    public function destroy($id)
    {
        $item = DaftarPendaftaran::findOrFail($id);
        $item->delete();

        return redirect()->route('data-pendaftaran');
    }

    public function destroy_umum($id)
    {
        $item = DaftarPendaftaran::findOrFail($id);
        $item->delete();

        return redirect()->route('data-pendaftaran-umum');
    }
}
