<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PrevStunting;
use App\Models\Kelurahan;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('home');
    }

    public function dashboard()
    {
        /** LINE CHART: Prevalensi EPPGBM per Bulan */
        $rows = PrevStunting::selectRaw('kelurahans.nama as kelurahan, AVG(prevalensi_eppgbm) as avg_eppgbm')
        ->join('stuntings', 'stuntings.id', '=', 'prev_stuntings.stunting_id')
        ->join('balitas', 'balitas.id', '=', 'stuntings.balita_id')
        ->join('kelurahans', 'kelurahans.id', '=', 'balitas.kelurahan_id')
        ->groupBy('kelurahans.nama')
        ->orderBy('kelurahans.nama')
        ->get();
    
        $line = ['categories' => [], 'data' => []];
        
        foreach ($rows as $row) {
            $line['categories'][] = $row->kelurahan;
            $line['data'][] = round($row->avg_eppgbm, 2);
        }
        
        if (empty($line['categories'])) {
            $line['categories'][] = 'No Data';
            $line['data'][] = 0;
        }
    
        /** PIE CHART: Simulasi Kosong karena tidak ada Product/Category */
        $pie = [[
            'name' => 'No Data',
            'y' => 0
        ]];

        /** COLUMN CHART: Simulasi Kosong */
        $column = [
            'categories' => ['No Data'],
            'series' => [[
                'name' => 'No Data',
                'data' => [0]
            ]]
        ];

        return view('datas.dash', compact('pie', 'line', 'column'));
    }
}
