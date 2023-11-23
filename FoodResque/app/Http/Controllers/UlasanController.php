<?php

namespace App\Http\Controllers;

use DataTables;
use App\Models\Ulasan;
use App\Models\Mitra;
use App\Models\Makanan;
use Illuminate\Http\Request;

class UlasanController extends Controller
{
    // Menampilkan semua data ulasan
    public function index()
    {
        return view('ulasan.index');
    }

    // Mengambil data ulasan untuk DataTables
    public function getData()
    {
        $ulasan = Ulasan::with(['mitra', 'makanan'])->get();

        return DataTables::of($ulasan)
            ->addColumn('action', function ($ulasan) {
                $btn = '<a href="' . route('ulasan.show', $ulasan->id) . '" class="btn btn-info">View</a>';
                $btn .= ' <a href="' . route('ulasan.edit', $ulasan->id) . '" class="btn btn-primary">Edit</a>';
                $btn .= ' <form action="' . route('ulasan.destroy', $ulasan->id) . '" method="POST" style="display: inline-block;">';
                $btn .= csrf_field();
                $btn .= method_field('DELETE');
                $btn .= ' <button type="submit" class="btn btn-danger" onclick="return confirm(\'Are you sure you want to delete this item?\')">Delete</button>';
                $btn .= ' </form>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    // Menampilkan form untuk menambahkan ulasan
    public function create()
    {
        $mitras = Mitra::all();
        $makanans = Makanan::all();

        return view('ulasan.create', [
            'mitras' => $mitras,
            'makanans' => $makanans,
        ]);
    }

    // Menyimpan ulasan yang baru ditambahkan
    public function store(Request $request)
    {
        // Validasi input, sesuaikan aturan validasi sesuai kebutuhan Anda
        $request->validate([
            'mitra_id' => 'required|exists:mitra,id',
            'makanan_id' => 'required|exists:makanan,id',
            'isi_ulasan' => 'required|string',
        ]);

        // Simpan data ulasan ke dalam database
        Ulasan::create($request->all());

        // Redirect dengan pesan sukses
        return redirect()->route('ulasan.index')->with('success', 'Ulasan berhasil ditambahkan!');
    }

    // Menampilkan detail ulasan berdasarkan ID
    public function show($id)
    {
        $ulasan = Ulasan::findOrFail($id);
        return view('ulasan.show', ['ulasan' => $ulasan]);
    }

    // Menampilkan form untuk mengedit ulasan berdasarkan ID
    public function edit($id)
    {
        $ulasan = Ulasan::findOrFail($id);
        return view('ulasan.edit', ['ulasan' => $ulasan]);
    }

    // Menyimpan perubahan pada ulasan yang diedit
    public function update(Request $request, $id)
    {
        // Validasi input, sesuaikan aturan validasi sesuai kebutuhan Anda
        $request->validate([
            'mitra_id' => 'required|exists:mitra,id',
            'makanan_id' => 'required|exists:makanan,id',
            'isi_ulasan' => 'required|string',
        ]);

        // Update data ulasan berdasarkan ID
        $ulasan = Ulasan::findOrFail($id);
        $ulasan->update($request->all());

        // Redirect dengan pesan sukses
        return redirect()->route('ulasan.index')->with('success', 'Ulasan berhasil diperbarui!');
    }

    // Menghapus ulasan berdasarkan ID
    public function destroy($id)
    {
        $ulasan = Ulasan::findOrFail($id);
        $ulasan->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('ulasan.index')->with('success', 'Ulasan berhasil dihapus!');
    }
}
