<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use App\Models\Kelurahan;
use App\Models\Kecamatan;

class KecamatanController extends Controller
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
        $kecamatans = Kecamatan::all();
        return view('kecamatan.index', [
            'kecamatans' => $kecamatans
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kecamatans = Kecamatan::get()->first();
        return view('kecamatan.create', [
            'kecamatan' => $kecamatans,
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
        // $kecamatans = new Kecamatan();
        $this->validate($request, [
            'kode' => 'required',
            'nama' => 'required',
        ]);

        $kecamatan = Kecamatan::create($request->all());
        // Kecamatan::create($request->all());
        // proses simpan data
        $kecamatan->save();

        // redirect ke halaman index kecamatan
        if ($kecamatan) {
            return redirect()->route('kecamatans.index')->with('success', 'Data berhasil disimpan');
        } else {
            return redirect()->route('kecamatans.index')->with('error', 'Data gagal disimpan');
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
    public function edit(Kecamatan $kecamatan)
    {
        $kecamatan = Kecamatan::findOrFail($kecamatan->id);
        return view('kecamatan.edit', [
            'kecamatan' => $kecamatan
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kecamatan $kecamatan)
    {
        $this->validate($request, [
            'kode' => 'required',
            'nama' => 'required',
        ]);
        $kecamatan->update($request->all());
        
        return redirect()->route('kecamatans.index')
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
        $kecamatan = Kecamatan::findOrFail($id);
        $kecamatan->delete();
        return redirect()->route('kecamatans.index');
    }
}
