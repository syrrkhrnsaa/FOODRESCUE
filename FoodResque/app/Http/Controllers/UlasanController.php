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

    public function indexData()
    {
        $data = Ulasan::latest()->get();
        return DataTables::of($data)
            ->addColumn('action', function ($row) {
                // You can add action buttons here if needed
                return '<button class="btn btn-sm btn-danger">Delete</button>';
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
        $ulasan = Ulasan::findOrFail($id);
        return view('ulasan.edit', compact('ulasan'));
    }

    public function update(Request $request, $id)
    {
        $ulasan = Ulasan::findOrFail($id);
        $ulasan->update([
            'mitra_id' => $request->mitra_id,
            'makanan_id' => $request->makanan_id,
            'isi_ulasan' => $request->isi_ulasan,
        ]);

        return redirect()->route('ulasan.index')->with('success', 'Ulasan updated successfully');
    }

    public function destroy($id)
    {
        $ulasan = Ulasan::findOrFail($id);
        $ulasan->delete();
        return redirect()->route('ulasan.index')->with('success', 'Ulasan deleted successfully');
    }
}