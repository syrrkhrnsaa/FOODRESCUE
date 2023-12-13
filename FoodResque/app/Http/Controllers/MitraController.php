<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mitra;
use Yajra\DataTables\DataTables;
use Mpdf\Mpdf;
use Exception;
use Illuminate\Support\Facades\Log;

class MitraController extends Controller
{
    public function index()
    {
        return view('mitra.index');
    }

    public function mitraData()
    {
        $mitra = Mitra::select(['id', 'username', 'nama_mitra', 'alamat', 'no_telp']);
        return DataTables::of($mitra)
            ->addColumn('action', function ($mitra) {
                $btn = '<a href="' . route('mitra.show', $mitra->id) . '" class="btn btn-sm btn-info">View</a>';
                $btn .= ' <a href="' . route('mitra.edit', $mitra->id) . '" class="btn btn-sm btn-primary">Edit</a>';
                $btn .= '<form action="' . route('mitra.destroy', $mitra->id) . '" method="POST" style="display:inline">
                        ' . method_field('DELETE') . csrf_field() . '
                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm(\'Are you sure want to delete?\')">Delete</button>
                    </form>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function exportPdf()
    {
        $mitraData = Mitra::all(); // Replace with your actual query

        $mpdf = new Mpdf();
        $mpdf->WriteHTML(view('mitra.pdf', ['mitraData' => $mitraData])->render());
        $mpdf->Output('mitra_list.pdf', 'D');
    }

    public function create()
    {
        return view('mitra.create');
    }

    public function store(Request $request)
{
    try {
        $validatedData = $request->validate([
            'username' => 'required',
            'nama_mitra' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
        ]);

        // Menyebabkan ModelNotFoundException dengan menggunakan metode findOrFail dengan ID yang tidak ada
        $mitra = Mitra::findOrFail(1010);

        Mitra::create($validatedData);

        return redirect()->route('mitra.index')->with('success', 'Mitra created successfully.');
    } catch (Exception $e) {
        Log::error('Error creating mitra: ' . $e->getMessage());
        return redirect()->route('mitra.index')->with('error', 'Failed to create mitra');
    }
}

    public function show($id)
    {
        $mitra = Mitra::findOrFail($id);
        return view('mitra.show', compact('mitra'));
    }

    public function edit($id)
    {
        $mitra = Mitra::findOrFail($id);
        return view('mitra.edit', compact('mitra'));
    }

    public function update(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'username' => 'required',
                'nama_mitra' => 'required',
                'alamat' => 'required',
                'no_telp' => 'required',
            ]);

            $mitra = Mitra::findOrFail($id);
            $mitra->update($validatedData);

            return redirect()->route('mitra.index')->with('success', 'Mitra updated successfully');
        } catch (Exception $e) {
            Log::error('Error updating mitra: ' . $e->getMessage());
            return redirect()->route('mitra.index')->with('error', 'Failed to update mitra');
        }
    }

    public function destroy($id)
    {
        try {
            $mitra = Mitra::findOrFail($id);
            $mitra->delete();

            return redirect()->route('mitra.index')->with('success', 'Mitra deleted successfully');
        } catch (Exception $e) {
            Log::error('Error deleting mitra: ' . $e->getMessage());
            return redirect()->route('mitra.index')->with('error', 'Failed to delete mitra');
        }
    }
}
