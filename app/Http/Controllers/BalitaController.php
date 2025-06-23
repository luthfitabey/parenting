<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Balita;
use App\Models\Kelurahan;
use App\Models\Stunting;

class BalitaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $balitas = Balita::with('kelurahan', 'stunting')->get();
        return view('balitas.index', compact('balitas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kelurahans = Kelurahan::all();
        $stuntings = Stunting::all();
        return view('balitas.create', compact('kelurahans', 'stuntings'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'tgl_lahir' => 'required|date',
            'tinggi_badan' => 'required|integer',
            'massa_badan' => 'required|integer',
            'kelurahan_id' => 'required|exists:kelurahans,id',
        ]);

        Balita::create($request->all());

        return redirect()->route('balitas.index')->with('success', 'Data Balita berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Balita $balita)
    {
        return view('balitas.show', compact('balita'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Balita $balita)
    {
        $kelurahans = Kelurahan::all();
        $stuntings = Stunting::all();
        return view('balitas.edit', compact('balita', 'kelurahans', 'stuntings'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Balita $balita)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'tgl_lahir' => 'required|date',
            'tinggi_badan' => 'required|integer',
            'massa_badan' => 'required|integer',
            'kelurahan_id' => 'required|exists:kelurahans,id',
        ]);

        $balita->update($request->all());

        return redirect()->route('balitas.index')->with('success', 'Data Balita berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Balita $balita)
    {
        $balita->delete();
        return redirect()->route('balitas.index')->with('success', 'Data Balita berhasil dihapus.');
    }
}
