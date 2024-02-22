<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Letter;
use App\Models\Disposisi;
use Carbon\Carbon;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;

class DisposisiController extends Controller
{

    public function index()
    {
        //
    }

    public function create($id)
    {

        $letter = Letter::findOrFail($id);
        return view('pages.admin.disposisi.create', [
            'letter' => $letter,
        ]);
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'letter_id' => 'required',
            'status' => 'required',
            'catatan_rektor' => 'required',
            'nominal' => 'required',
            'tertulis' => 'required',
        ]);

        if ($request->file('letter_file')) {
            $validatedData['letter_file'] = $request->file('letter_file')->store('letter-file', 'public');
        }
        if ($request->input('status')) {
            $validatedData['status'] = implode(',', $request->status);
        }
        if ($request->input('sifat')) {
            $validatedData['sifat'] = implode(',', $request->sifat);
        }
        if ($request->input('petunjuk')) {
            $validatedData['petunjuk'] = implode(',', $request->petunjuk);
        }

        if ($request->input('penerima_disposisi_2')) {
            $validatedData['penerima_disposisi_2'] = implode(',', $request->penerima_disposisi_2);
        }

        //   ddd($request->all());

        $redirect = 'surat-disposisi';

        Disposisi::create($validatedData);
        return redirect()
            ->route($redirect)
            ->with('success', 'Sukses! 1 Data Berhasil Disimpan');
    }

    public function disposisi_form(Request $request)
    {
        if (request()->ajax()) {
            $query = Disposisi::with(['letter'])->latest()->get();
            $user = $request->user();

            if ($user->hasRole('admin')) {
                return Datatables::of($query)
                    ->addColumn('created_at', function ($row) {
                        return Carbon::parse($row->created_at)->translatedFormat('l, d F Y');
                    })
                    ->addColumn('action', function ($item) {
                        return '
                        <a class="btn btn-success btn-xs" href="' . route('detail-disposisi', $item->id) . '">
                            <i class="fa fa-search-plus"></i> &nbsp; Detail
                        </a>
                        <a class="btn btn-primary btn-xs" href="' . route('disposisi.edit', $item->id) . '">
                            <i class="fas fa-edit"></i> &nbsp; Ubah
                        </a>
                        <form action="' . route('disposisi.destroy', $item->id) . '" method="POST" onsubmit="return confirm(' . "'Anda akan menghapus item ini dari situs anda?'" . ')">
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
            } else if ($user->hasRole('ormawa')) {
                return Datatables::of($query)
                    ->addColumn('created_at', function ($row) {
                        return Carbon::parse($row->created_at)->translatedFormat('l, d F Y');
                    })
                    ->addColumn('action', function ($item) {
                        return '
                        <a class="btn btn-success btn-xs" href="' . route('detail-disposisi', $item->id) . '">
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
            } else if ($user->hasRole('peninjau')) {
                return Datatables::of($query)
                    ->addColumn('created_at', function ($row) {
                        return Carbon::parse($row->created_at)->translatedFormat('l, d F Y');
                    })
                    ->addColumn('action', function ($item) {
                        return '
                        <a class="btn btn-success btn-xs" href="' . route('detail-disposisi', $item->id) . '">
                            <i class="fa fa-search-plus"></i> &nbsp; Detail
                        </a>
                        <a class="btn btn-primary btn-xs" href="' . route('disposisi.edit', $item->id) . '">
                            <i class="fas fa-edit"></i> &nbsp; Ubah
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
        }

        return view('pages.admin.disposisi.incoming');
    }

    public function show($id)
    {
        $item = Disposisi::with(['letter'])->findOrFail($id);

        return view('pages.admin.disposisi.show', [
            'item' => $item,
        ]);
    }
    public function disposisiprint($id)
    {
        $item = Disposisi::with(['letter'])->findOrFail($id);

        return view('pages.admin.disposisi.print-incoming', [
            'item' => $item,
            'status' => explode(',', $item->status),
            'sifat' => explode(',', $item->sifat),
            'petunjuk' => explode(',', $item->petunjuk),
            'disposisi' => explode(',', $item->letter->disposisi),
        ]);
    }

    public function edit($id)
    {
        $item = Disposisi::findOrFail($id);

        $letters = Letter::findOrFail($id);


        return view('pages.admin.disposisi.edit', [
            'letter' => $letters,
            'item' => $item,
        ]);
    }

    public function download_letter($id)
    {
        $item = Disposisi::findOrFail($id);

        return Storage::download($item->letter_file);
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'letter_id' => 'required',
            'status' => 'required',
            'catatan_rektor' => 'required',
            'nominal' => 'required',
            'tertulis' => 'required',
        ]);

        $item = Disposisi::findOrFail($id);

        if ($request->file('letter_file')) {
            $validatedData['letter_file'] = $request->file('letter_file')->store('letter-file', 'public');
        }
        if ($request->input('status')) {
            $validatedData['status'] = implode(',', $request->status);
        }
        if ($request->input('sifat')) {
            $validatedData['sifat'] = implode(',', $request->sifat);
        }
        if ($request->input('petunjuk')) {
            $validatedData['petunjuk'] = implode(',', $request->petunjuk);
        }
        if ($request->input('penerima_disposisi_2')) {
            $validatedData['penerima_disposisi_2'] = implode(',', $request->penerima_disposisi_2);
        }
        $redirect = 'surat-disposisi';

        // dd($request->all());

        $item->update($validatedData);

        return redirect()
            ->route($redirect)
            ->with('success', 'Sukses! 1 Data Berhasil Diubah');
    }

    public function destroy($id)
    {
        $item = Disposisi::findorFail($id);
        $redirect = 'surat-disposisi';
        Storage::delete($item->letter_file);

        $item->delete();

        return redirect()
            ->route($redirect)
            ->with('success', 'Sukses! 1 Data Berhasil Dihapus');
    }
}
