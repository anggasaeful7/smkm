<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Prodi;

use Yajra\DataTables\Facades\DataTables;

class ProdiController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $query = Prodi::latest()->get();

            return Datatables::of($query)
                ->addColumn('action', function ($item) {
                    return '
                        <a class="btn btn-primary btn-xs" data-bs-toggle="modal" data-bs-target="#updateModal'.$item->id.'">
                            <i class="fas fa-edit"></i> &nbsp; Ubah
                        </a>
                        <form action="' . route('prodi.destroy', $item->id) . '" method="POST" onsubmit="return confirm('."'Anda akan menghapus item ini dari situs anda?'".')">
                            ' . method_field('delete') . csrf_field() . '
                            <button class="btn btn-danger btn-xs">
                                <i class="far fa-trash-alt"></i> &nbsp; Hapus
                            </button>
                        </form>
                    ';
                })
                ->addIndexColumn()
                ->removeColumn('id')
                ->rawColumns(['action'])
                ->make();
        }
        $prodis = Prodi::all();

        return view('prodi.index',[
            'prodi' => $prodis
        ]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Prodi::create([
            'name' => $request->name
        ]);

        return redirect()
                    ->route('prodi.index')
                    ->with('success', 'Sukses! 1 Data Berhasil Disimpan');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required'
        ]);

        Prodi::where('id', $id)
                ->update([
                    'name' => $request->name
                ]);

        return redirect()
                    ->route('prodi.index')
                    ->with('success', 'Sukses! 1 Data telah diperbarui');
    }

    public function destroy($id)
    {
        $item = Prodi::findorFail($id);

        $item->delete();

        return redirect()
                    ->route('prodi.index')
                    ->with('success', 'Sukses! 1 Data Berhasil Dihapus');
    }
}
