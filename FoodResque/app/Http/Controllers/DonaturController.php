<?php

namespace App\Http\Controllers;

use Yajra\DataTables\DataTables;

use Illuminate\Http\Request;
use App\Models\Donatur;
use Mpdf\Mpdf;

class DonaturController extends Controller
{
    public function index()
    {
        return view('donatur.index');
    }

    public function donaturData()
{
    $donatur = Donatur::select(['id', 'username', 'nama_donatur', 'alamat', 'no_telp']);

    return datatables()->of($donatur)
        ->addColumn('action', function ($donatur) {
            $btn = '<a href="' . route('donatur.show', $donatur->id) . '" class="btn btn-xs btn-success">Show</a> ';
            $btn .= '<a href="' . route('donatur.edit', $donatur->id) . '" class="btn btn-xs btn-primary">Edit</a> ';
            $btn .= '<form action="' . route('donatur.destroy', $donatur->id) . '" method="POST" style="display:inline">
                        ' . method_field('DELETE') . csrf_field() . '
                        <button type="submit" class="btn btn-xs btn-danger" onclick="return confirm(\'Are you sure?\')">Delete</button>
                    </form>';

            return $btn;
        })
        ->rawColumns(['action'])
        ->make(true);
}

    public function create()
    {
        return view('donatur.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'nama_donatur' => 'required|string',
            'alamat' => 'required|string',
            'no_telp' => 'required|string',
        ]);

        Donatur::create($request->all());

        return redirect()->route('donatur.index')->with('success', 'Donatur berhasil ditambahkan.');
    }

    public function show(Donatur $donatur)
    {
        return view('donatur.show', compact('donatur'));
    }

    public function exportPdf()
    {
        $donaturData = Donatur::all(); // Replace with your actual query

        $mpdf = new Mpdf();
        $mpdf->WriteHTML(view('donatur.pdf', ['donaturData' => $donaturData])->render());
        $mpdf->Output('donatur_list.pdf', 'D');
    }

    public function edit(Donatur $donatur)
    {
        return view('donatur.edit', compact('donatur'));
    }

    public function update(Request $request, Donatur $donatur)
    {
        $request->validate([
            'username' => 'required|string',
            'nama_donatur' => 'required|string',
            'alamat' => 'required|string',
            'no_telp' => 'required|string',
        ]);

        $donatur->update($request->all());

        return redirect()->route('donatur.index')->with('success', 'Donatur berhasil diperbarui.');
    }

    public function destroy(Donatur $donatur)
    {
        $donatur->delete();

        return redirect()->route('donatur.index')->with('success', 'Donatur berhasil dihapus.');
    }
}
