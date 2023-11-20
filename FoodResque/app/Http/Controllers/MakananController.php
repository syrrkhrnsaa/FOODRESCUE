<?php

namespace App\Http\Controllers;

use App\Models\Makanan;
use Illuminate\Http\Request;
use DataTables;

class MakananController extends Controller
{
    // Menampilkan semua data makanan
    public function index()
    {
        return view('makanan.index');
    }

    // Mengambil data makanan untuk DataTables
    public function getData()
    {
        $makanans = Makanan::with(['donatur', 'mitra'])->get();

        return DataTables::of($makanans)
            ->addColumn('action', function ($makanan) {
                return view('makanan.actions', compact('makanan'))->render();
            })
            ->toJson();
    }

    // Menampilkan form untuk menambahkan makanan
    public function create()
    {
        return view('makanan.create');
    }

    // Menyimpan makanan yang baru ditambahkan
    public function store(Request $request)
    {
        // Validasi input, sesuaikan aturan validasi sesuai kebutuhan Anda
        $request->validate([
            'nama_Menu' => 'required|string',
            'jumlah_Makanan' => 'required|integer',
            'tanggal_Expired' => 'required|date',
            'waktu' => 'required|date_format:H:i', // Format H:i untuk waktu (jam:menit)
            'status' => 'required|string',
            'donatur_id' => 'required|exists:donatur,id',
            'mitra_id' => 'required|exists:mitra,id',
        ]);

        // Simpan data makanan ke dalam database
        Makanan::create($request->all());

        // Redirect dengan pesan sukses
        return redirect()->route('makanan.index')->with('success', 'Makanan berhasil ditambahkan!');
    }

    // Menampilkan detail makanan berdasarkan ID
    public function show($id)
    {
        $makanan = Makanan::findOrFail($id);
        return view('makanan.show', ['makanan' => $makanan]);
    }

    // Menampilkan form untuk mengedit makanan berdasarkan ID
    public function edit($id)
    {
        $makanan = Makanan::findOrFail($id);
        return view('makanan.edit', ['makanan' => $makanan]);
    }

    // Menyimpan perubahan pada makanan yang diedit
    public function update(Request $request, $id)
    {
        // Validasi input, sesuaikan aturan validasi sesuai kebutuhan Anda
        $request->validate([
            'nama_Menu' => 'required|string',
            'jumlah_Makanan' => 'required|integer',
            'tanggal_Expired' => 'required|date',
            'waktu' => 'required|time',
            'status' => 'required|string',
            'donatur_id' => 'required|exists:donatur,id',
            'mitra_id' => 'required|exists:mitra,id',
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