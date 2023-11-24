<?php

namespace App\Http\Controllers;
use Yajra\DataTables\DataTables;
use App\Models\Makanan;
use App\Models\Donatur;
use Illuminate\Http\Request;
use Mpdf\Mpdf;

class MakananController extends Controller
{
    // Menampilkan semua data makanan
    public function index()
    {
        return view('makanan.index');
    }

    // Mengambil data makanan untuk DataTables
    public function makananData()
    {
        $makanans = Makanan::with(['donatur', 'mitra']) // Load relasi dengan Donatur dan Mitra
            ->select(['id', 'nama_menu', 'jumlah_makanan', 'tanggal_expired', 'waktu', 'status', 'donatur_id', 'mitra_id']);

        return DataTables::of($makanans)
            ->addColumn('action', function ($makanan) {
                $btn = '<a href="' . route('makanan.show', $makanan->id) . '" class="btn btn-sm btn-info">View</a>';
                $btn .= ' <a href="' . route('makanan.edit', $makanan->id) . '" class="btn btn-sm btn-primary">Edit</a>';
                $btn .= ' <form action="' . route('makanan.destroy', $makanan->id) . '" method="POST" style="display: inline-block;">';
                $btn .= csrf_field();
                $btn .= method_field('DELETE');
                $btn .= ' <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm(\'Are you sure you want to delete this item?\')">Delete</button>';
                $btn .= ' </form>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function exportPdf()
    {
        $makananData = Makanan::all(); // Replace with your actual query

        $mpdf = new Mpdf();
        $mpdf->WriteHTML(view('makanan.pdf', ['makananData' => $makananData])->render());
        $mpdf->Output('makanan_list.pdf', 'D');
    }

    // Menampilkan form untuk menambahkan makanan
    public function create()
    {
        return view('makanan.create');
    }

    // Menyimpan makanan yang baru ditambahkan
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_menu' => 'required|string',
            'jumlah_makanan' => 'required|integer',
            'tanggal_expired' => 'required|date',
            'waktu' => 'required|date_format:H:i',
            'status' => 'required|string',
            'donatur_id' => 'required',
            'mitra_id' => 'required',
            'foto' => 'nullable'
        ]);

        Makanan::create($validatedData);

        return redirect()->route('makanan.index')->with('success', 'Makanan created successfully.');
    }

    // Menampilkan detail makanan berdasarkan ID
    public function show($id)
    {
        $makanan = Makanan::findOrFail($id);
        return view('makanan.show', compact('makanan'));
    }

    // Menampilkan form untuk mengedit makanan berdasarkan ID
    public function edit($id)
    {
        $makanan = Makanan::findOrFail($id); // Mengambil data makanan berdasarkan ID
        return view('makanan.edit', compact('makanan'));
    }

    // Menyimpan perubahan pada makanan yang diedit
    public function update(Request $request, $id)
    {
        // Validasi input, sesuaikan aturan validasi sesuai kebutuhan Anda
        $request->validate([
            'nama_menu' => 'required|string',
            'jumlah_makanan' => 'required|integer',
            'tanggal_expired' => 'required|date',
            'waktu' => 'required|date_format:H:i',
            'status' => 'required|string',
            'donatur_id' => 'required|exists:donatur,id',
            'mitra_id' => 'required|exists:mitra,id',
            'foto' => 'nullable'
        ]);

        // Update data makanan berdasarkan ID
        $makanan = Makanan::findOrFail($id);
        $makanan->update($request->all());

        // Redirect dengan pesan sukses
        return redirect()->route('makanan.index')->with('success', 'Makanan berhasil diperbarui!');
    }

    // Menghapus makanan berdasarkan ID
    public function destroy($id)
    {
        $makanan = Makanan::findOrFail($id);
        $makanan->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('makanan.index')->with('success', 'Makanan berhasil dihapus!');
    }
}