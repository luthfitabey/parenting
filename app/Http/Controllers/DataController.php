<?php

namespace App\Http\Controllers;
use App\Models\Kelurahan;
use App\Models\Kecamatan;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function kelurahans(){
        $kelurahan = Kelurahan::orderBy('created_at', 'DESC');
        return datatables()->of($kelurahan)
        ->addColumn('action', 'kelurahans.action')
        ->addIndexColumn()
        ->rawColumns(['action'])
        ->toJson();
    }
    public function kecamatans(){
        $kecamatan = Kecamatan::orderBy('created_at', 'DESC');
        return datatables()->of($kecamatan)
        ->addColumn('action', 'kecamatans.action')
        ->addIndexColumn()
        ->rawColumns(['action'])
        ->toJson();
    }
}
