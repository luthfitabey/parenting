<?php

namespace App\Http\Controllers;

use App\Models\Stunting;
use App\Models\Balita;
use Illuminate\Http\Request;

class StuntingController extends Controller
{
    public function index()
    {
        $stuntings = Stunting::with('balita')->get();
        return view('stuntings.index', compact('stuntings'));
    }

    public function create()
    {
        $balitas = Balita::all();
        $months = [
            'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];
        return view('stuntings.create', compact('balitas', 'months'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'balita_id' => 'required|exists:balitas,id',
            'isStunting' => 'required|boolean',
            'bulan_timbang' => 'required|string',
        ]);
        
        Stunting::create($request->all());
        return redirect()->route('stuntings.index')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit(Stunting $stunting)
    {
        $balitas = Balita::all();
        $months = [
            'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 
            'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
        ];
        return view('stuntings.edit', compact('stunting', 'balitas', 'months'));
    }

    public function update(Request $request, Stunting $stunting)
    {
        $request->validate([
            'balita_id' => 'required|exists:balitas,id',
            'isStunting' => 'required|boolean',
            'bulan_timbang' => 'required|string',
        ]);
        
        $stunting->update($request->all());
        return redirect()->route('stuntings.index')->with('success', 'Data berhasil diperbarui');
    }
    public function destroy(Stunting $stunting)
    {
        $stunting->delete();
        return redirect()->route('stuntings.index')->with('success', 'Data berhasil dihapus');
    }
}
