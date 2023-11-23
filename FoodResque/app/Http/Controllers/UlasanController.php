<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ulasan;

class UlasanController extends Controller
{
    // ...

    public function index()
    {
        $ulasan = Ulasan::all();
        return view('ulasan.index', compact('ulasan'));
    }

    public function create()
    {
        return view('ulasan.create');
    }

    public function store(Request $request)
    {
        Ulasan::create($request->all());
        return redirect()->route('ulasan.index')->with('success', 'Ulasan created successfully');
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
        $ulasan->update($request->all());
        return redirect()->route('ulasan.index')->with('success', 'Ulasan updated successfully');
    }

    public function destroy($id)
    {
        $ulasan = Ulasan::findOrFail($id);
        $ulasan->delete();
        return redirect()->route('ulasan.index')->with('success', 'Ulasan deleted successfully');
    }
}
