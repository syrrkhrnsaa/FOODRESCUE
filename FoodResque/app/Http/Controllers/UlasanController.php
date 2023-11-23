<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ulasan;
use App\Models\Mitra;
use App\Models\Makanan;
use DataTables;

class UlasanController extends Controller
{
    // ...

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Ulasan::with(['mitra:id,name', 'makanan:id,name'])->get();

            return DataTables::of($data)
                ->addColumn('mitra_id', function($ulasan) {
                    return $ulasan->mitra->id;
                })
                ->addColumn('makanan_id', function($ulasan) {
                    return $ulasan->makanan->id;
                })
                ->addColumn('action', function($ulasan) {
                    return view('ulasan.actions', compact('ulasan'))->render();
                })
                ->make(true);
        }

        return view('ulasan.index');
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