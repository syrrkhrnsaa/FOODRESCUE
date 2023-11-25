<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ulasan;
use App\Models\Mitra;
use App\Models\Makanan;
use DataTables;
use Mpdf\Mpdf;

class UlasanController extends Controller
{
    // ...

    public function index(Request $request)
    {
        return view('ulasan.index');
    }

    public function exportPdf()
    {
        $ulasanData = Ulasan::all(); // Replace with your actual query
        $mpdf = new Mpdf();
        $mpdf->WriteHTML(view('ulasan.pdf', ['ulasanData' => $ulasanData])->render());
        $mpdf->Output('ulasan_list.pdf', 'D');
    }

    public function ulasanData()
    {
        $ulasan = Ulasan::with('mitra', 'makanan')->select(['id', 'mitra_id', 'makanan_id', 'isi_ulasan']);
        return DataTables::of($ulasan)
            ->addColumn('mitra', function ($ulasan) {
                return $ulasan->mitra->nama_mitra;
            })
            ->addColumn('makanan', function ($ulasan) {
                return $ulasan->makanan->id;
            })
            ->addColumn('action', function ($ulasan) {
                $btn = '<a href="' . route('ulasan.show', $ulasan->id) . '" class="btn btn-sm btn-info">View</a>';
                $btn .= ' <a href="' . route('ulasan.edit', $ulasan->id) . '" class="btn btn-sm btn-primary">Edit</a>';
                $btn .= '<form action="' . route('ulasan.destroy', $ulasan->id) . '" method="POST" style="display:inline">
                        ' . method_field('DELETE') . csrf_field() . '
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm(\'Are you sure want to delete?\')">Delete</button>
                    </form>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true); 
    }


    public function create()
    {
        $mitras = Mitra::all(['id']);
        $makanans = Makanan::all(['id']);

        return view('ulasan.create', [
            'mitras' => $mitras,
            'makanans' => $makanans,
        ]);
    }

    public function store(Request $request)
    {
        // Tampilkan data yang dikirim dari formulir
        var_dump($request->all());

        // Validasi data
        $request->validate([
            'mitra_id' => 'required',
            'makanan_id' => 'required',
            'isi_ulasan' => 'required',
        ]);

        // Tambahkan data ulasan ke database
        Ulasan::create([
            'mitra_id' => $request->mitra_id,
            'makanan_id' => $request->makanan_id,
            'isi_ulasan' => $request->isi_ulasan,
        ]);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('ulasan.index')->with('success', 'Ulasan berhasil dibuat');
    }

    public function show($id)
    {
        $ulasan = Ulasan::findOrFail($id);
        return view('ulasan.show', compact('ulasan'));
    }

    public function edit($id)
    {
        $ulasan = Ulasan::with('mitra', 'makanan')->findOrFail($id);
        $mitras = Mitra::all();
        $makanans = Makanan::all();
        return view('ulasan.edit', compact('ulasan', 'mitras', 'makanans'));
    }


    public function update(Request $request, $id)
    {
        // Validasi data
        $request->validate([
            'mitra_id' => 'required',
            'makanan_id' => 'required',
            'isi_ulasan' => 'required',
        ]);

        // Temukan ulasan berdasarkan ID
        $ulasan = Ulasan::findOrFail($id);

        // Perbarui data ulasan
        $ulasan->update([
            'mitra_id' => $request->mitra_id,
            'makanan_id' => $request->makanan_id,
            'isi_ulasan' => $request->isi_ulasan,
        ]);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('ulasan.index')->with('success', 'Ulasan berhasil diperbarui');
    }


    public function destroy($id)
    {
        $ulasan = Ulasan::findOrFail($id);
        $ulasan->delete();
        return redirect()->route('ulasan.index')->with('success', 'Ulasan deleted successfully');
    }
}