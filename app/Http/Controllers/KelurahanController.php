<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Models\Kelurahan;
use App\Models\Kecamatan;

class kelurahanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $kelurahans = Kelurahan::with('kecamatan')->get();
        return view('kelurahan.index', [
            'kelurahans' => $kelurahans
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kecamatans = Kecamatan::all(); // Mengambil semua kecamatan
        return view('kelurahan.create', [
            'kecamatans' => $kecamatans,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $kecamatans = Kecamatan::all(); // Get all kecamatan
        
        $this->validate($request, [
            'kode' => 'required',
            'nama' => 'required',
            'kecamatan_id' => 'required|exists:kecamatans,id',
        ]);
         // Simpan data ke tabel kelurahan
        $kelurahan = new Kelurahan([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'kecamatan_id' => $request->kecamatan_id, // Mengambil kecamatan_id dari request
        ]);
        // dd($request->all());

    // Cek apakah kelurahan terhubung dengan kecamatan
    // dd($kelurahan->kecamatan);
    
        if ($kelurahan->save()) {
            return redirect()->route('kelurahans.index')->with('success', 'Data berhasil disimpan');
        } else {
            return redirect()->back()->with('error', 'Data gagal disimpan');
        }   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(kelurahan $kelurahan)
    {
        $kecamatans = Kecamatan::all(); 
        return view('kelurahan.edit', [
            'kelurahan' => $kelurahan,
            'kecamatans' => $kecamatans // Kirim data kecamatan ke view
        ]);

        $kelurahan = kelurahan::findOrFail($kelurahan->id);
        return view('kelurahan.edit', [
            'kelurahan' => $kelurahan
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, kelurahan $kelurahan)
    {
        $kecamatans = Kecamatan::all(); // Get all kecamatan
        $this->validate($request, [
            'kode' => 'required',
            'nama' => 'required',
            'kecamatan_id' => 'required',
        ]);
        $kelurahan->update($request->all());
        
        return redirect()->route('kelurahans.index')
        ->with('success', 'Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kelurahan = kelurahan::findOrFail($id);
        $kelurahan->delete();
        return redirect()->route('kelurahans.index');
    }
}
