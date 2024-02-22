<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Jenisikutserta;
use App\Models\User;
use App\Models\Datapendaftar;

use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;

class PendaftarController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
        $users = User::all();
        $jenisikutserta = Jenisikutserta::all();

        return view('datapendaftar.create',[
            'users' => $users,
            'jenisikutserta' => $jenisikutserta,
        ]);
    }

    public function store(Request $request)
{
    $validatedData = $request->validate([
        'user_id' => 'required',
        'npm_nidn' => 'required',
        'instansi' => 'required',
        'jenisikutserta_id' => 'required',
        'audience_type' => 'required',
    ]);

    $redirect = 'data-pendaftar';

    if ($validatedData['audience_type'] == 'Pendaftar') {
        $redirect = 'data-pendaftar';
    }

    DataPendaftar::create($validatedData);

    return redirect()
        ->route($redirect)
        ->with('success', 'Sukses! 1 Data Berhasil Disimpan');
}

    public function data_pendaftar()
    {
        if (request()->ajax()) {
            $query = Datapendaftar::with(['user','jenisikutserta'])->where('audience_type','Pendaftar')->latest()->get();
            return Datatables::of($query)
            ->addColumn('action', function ($item) {
                return '
                    <form action="' . route('datapendaftar.destroy', $item->id) . '" method="POST" onsubmit="return confirm('."'Anda akan menghapus item ini dari situs anda?'".')">
                        ' . method_field('delete') . csrf_field() . '
                        <button class="btn btn-danger btn-xs">
                            <i class="far fa-trash-alt"></i> &nbsp; Hapus
                        </button>
                    </form>
                ';
            })
                ->editColumn('post_status', function ($item) {
                   return $item->post_status == 'Published' ? '<div class="badge bg-green-soft text-green">'.$item->post_status.'</div>':'<div class="badge bg-gray-200 text-dark">'.$item->post_status.'</div>';
                })
                ->addIndexColumn()
                ->removeColumn('id')
                ->rawColumns(['action','post_status'])
                ->make();
        }

        return view('datapendaftar.incoming');
    }
}
