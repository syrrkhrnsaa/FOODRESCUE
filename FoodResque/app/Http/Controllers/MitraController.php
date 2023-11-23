<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mitra;
use Yajra\DataTables\DataTables;

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
                $btn = '<a href="' . route('mitra.show', $mitra->id) . '" class="btn btn-info">View</a>';
                $btn .= ' <a href="' . route('mitra.edit', $mitra->id) . '" class="btn btn-primary">Edit</a>';
                $btn .= ' <form action="' . route('mitra.destroy', $mitra->id) . '" method="POST" style="display: inline-block;">';
                $btn .= csrf_field();
                $btn .= method_field('DELETE');
                $btn .= ' <button type="submit" class="btn btn-danger" onclick="return confirm(\'Are you sure you want to delete this item?\')">Delete</button>';
                $btn .= ' </form>';
                return $btn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function create()
    {
        return view('mitra.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required',
            'nama_mitra' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
        ]);

        Mitra::create($validatedData);

        return redirect()->route('mitra.index')->with('success', 'Mitra created successfully.');
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
        $validatedData = $request->validate([
            'username' => 'required',
            'nama_mitra' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
        ]);

        $mitra = Mitra::findOrFail($id);
        $mitra->update($validatedData);

        return redirect()->route('mitra.index')->with('success', 'Mitra updated successfully');
    }

    public function destroy($id)
    {
        $mitra = Mitra::findOrFail($id);
        $mitra->delete();

        return redirect()->route('mitra.index')->with('success', 'Mitra deleted successfully');
    }
}
