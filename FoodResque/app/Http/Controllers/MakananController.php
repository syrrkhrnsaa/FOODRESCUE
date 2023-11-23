<?php

namespace App\Http\Controllers;
use Yajra\DataTables\DataTables;
use App\Models\Makanan;
use App\Models\Donatur;
use Illuminate\Http\Request;

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
            ->select(['id', 'nama_Menu', 'jumlah_Makanan', 'tanggal_Expired', 'waktu', 'status', 'donatur_id', 'mitra_id']);

        return DataTables::of($makanans)
            ->addColumn('action', function ($makanan) {
                $btn = '<a href="' . route('makanan.show', $makanan->id) . '" class="btn btn-info">View</a>';
                $btn .= ' <a href="' . route('makanan.edit', $makanan->id) . '" class="btn btn-primary">Edit</a>';
                $btn .= ' <form action="' . route('makanan.destroy', $makanan->id) . '" method="POST" style="display: inline-block;">';
                $btn .= csrf_field();
                $btn .= method_field('DELETE');
                $btn .= ' <button type="submit" class="btn btn-danger" onclick="return confirm(\'Are you sure you want to delete this item?\')">Delete</button>';
                $btn .= ' </form>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    // Menampilkan form untuk menambahkan makanan
    public function create()
    {
        // Ambil data Donatur untuk dipilih pada form
        $donaturs = Donatur::all();

        return view('makanan.create', compact('donaturs'));
    }

    // Menyimpan makanan yang baru ditambahkan
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_Menu' => 'required|string',
            'jumlah_Makanan' => 'required|integer',
            'tanggal_Expired' => 'required|date',
            'waktu' => 'required|date_format:H:i',
            'status' => 'required|in:pending,approved,rejected',
            'donatur_id' => 'required|exists:donaturs,id',
            'mitra_id' => 'nullable|exists:mitras,id', // Bisa null terlebih dahulu
        ]);

        Makanan::create($validatedData);

        return redirect()->route('makanan.index')->with('success', 'Makanan created successfully.');
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