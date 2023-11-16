<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Donatur;

class DonaturController extends Controller
{
    public function index()
    {
        $donatur = Donatur::all();
        return view('donatur.index', compact('donatur'));
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
