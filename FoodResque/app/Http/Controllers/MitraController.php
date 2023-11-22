<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mitra;
use Yajra\DataTables\DataTables;

class MitraController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $data = Mitra::latest()->get();
            return DataTables::of($data)
                ->addColumn('action', function ($row) {
                    $btn = '<a href="' . route('mitra.show', $row->mitra_id) . '" class="btn btn-info">View</a> <a href="' . route('mitra.edit', $row->mitra_id) . '" class="btn btn-primary">Edit</a>';
                    $btn .= ' <form action="' . route('mitra.destroy', $row->mitra_id) . '" method="POST" style="display: inline-block;">
                                ' . csrf_field() . '
                                ' . method_field('DELETE') . '
                                <button type="submit" class="btn btn-danger" onclick="return confirm(\'Apakah Anda yakin ingin menghapus item ini?\')">Delete</button>
                                </form>';
                    return $btn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('mitra.index');
    }

    public function mitraData()
    {
        $mitra = Mitra::select(['mitra_id', 'username', 'nama_mitra', 'alamat', 'no_telp']);
        return DataTables::of($mitra)
            ->addColumn('action', function ($mitra) {
                $btn = '<a href="' . route('mitra.show', $mitra->mitra_id) . '" class="btn btn-info">View</a>';
                $btn .= ' <a href="' . route('mitra.edit', $mitra->mitra_id) . '" class="btn btn-primary">Edit</a>';
                $btn .= ' <form action="' . route('mitra.destroy', $mitra->mitra_id) . '" method="POST" style="display: inline-block;">';
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
