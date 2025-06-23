<?php

namespace App\Http\Controllers;

use App\Models\PrevStunting;
use App\Models\Kelurahan;
use App\Models\Stunting;
use App\Models\Balita;
use Illuminate\Http\Request;

class PrevStuntingController extends Controller
{
    public function index()
    {
        $prev_stuntings = PrevStunting::with(['stunting.balita.kelurahan'])->get();
        return view('prevalensis.index', compact('prev_stuntings'));
    }

    public function create()
    {
        $kelurahans = Kelurahan::withCount([
            'balitas as total_balita',
            'balitas as balita_stunting' => function ($query) {
                $query->whereHas('stunting', function ($q) {
                    $q->where('isStunting', true);
                });
            }
        ])->get();

        return view('prevalensis.create', compact('kelurahans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kelurahan_id' => 'required|exists:kelurahans,id',
            'prevalensi_ski' => 'required|numeric',
        ]);

        $kelurahanId = $request->kelurahan_id;
        $totalBalita = Balita::where('kelurahan_id', $kelurahanId)->count();
        $balitaStunting = Balita::where('kelurahan_id', $kelurahanId)
            ->whereHas('stunting', function ($query) {
                $query->where('isStunting', true);
            })
            ->count();

        $prevalensiEPPGBM = $totalBalita > 0 ? ($balitaStunting / $totalBalita) * 100 : 0;

        PrevStunting::create([
            'prevalensi_eppgbm' => $prevalensiEPPGBM,
            'prevalensi_ski' => $request->prevalensi_ski,
            'stunting_id' => Stunting::whereHas('balita', function ($query) use ($kelurahanId) {
                $query->where('kelurahan_id', $kelurahanId);
            })->value('id'),
        ]);

        return redirect()->route('prevalensis.index')->with('success', 'Data Prevalensi Stunting berhasil ditambahkan.');
    }
    public function edit($id)
    {
        $kelurahans = Kelurahan::withCount([
            'balitas as total_balita',
            'balitas as balita_stunting' => function ($query) {
                $query->whereHas('stunting', function ($q) {
                    $q->where('isStunting', true);
                });
            }
        ])->get();
        $prev_stunting = PrevStunting::findOrFail($id);
        return view('prevalensis.edit', compact('prev_stunting', 'kelurahans'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'prevalensi_ski' => 'required|numeric'
        ]);

        $prev_stunting = PrevStunting::findOrFail($id);
        $prev_stunting->update([
            'prevalensi_ski' => $request->prevalensi_ski
        ]);

        return redirect()->route('prevalensis.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $prev_stunting = PrevStunting::findOrFail($id);
        $prev_stunting->delete();
        return redirect()->route('prevalensis.index')->with('success', 'Data berhasil dihapus.');
    }
}
