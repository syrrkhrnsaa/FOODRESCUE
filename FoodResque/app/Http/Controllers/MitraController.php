<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mitra;
//use DataTables;
use Yajra\DataTables\DataTables;
//use Yajra\DataTables\Facades\DataTables;

class MitraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mitra.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $mitra = Mitra::findOrFail($id);
        return view('mitra.show', compact('mitra'));    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mitra = Mitra::findOrFail($id);
        return view('mitra.edit', compact('mitra'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mitra = Mitra::findOrFail($id);
        $mitra->delete();

        return redirect()->route('mitra.index')->with('success', 'Mitra deleted successfully');
    }
}
