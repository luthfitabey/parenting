@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Dashboard</h1>
@endsection

@section('content')
<div class="container-fluid">
    <!-- Pie Chart -->
    <div class="card">
        <div class="card-header">Produk Berdasarkan Kategori</div>
        <div class="card-body">
            @if(count($pie) === 1 && $pie[0]['y'] === 0)
                <div class="alert alert-warning">Data produk belum tersedia.</div>
            @endif
            <div id="pieChart"></div>
        </div>
    </div>

    <!-- Line Chart -->
    <div class="card mt-4">
        <div class="card-header">Prevalensi Stunting per Bulan</div>
        <div class="card-body">
            @if(count($line['categories']) === 1 && $line['data'][0] === 0)
                <div class="alert alert-warning">Data prevalensi stunting belum tersedia.</div>
            @endif
            <div id="lineChart"></div>
        </div>
    </div>

    <!-- Column Chart -->
    <div class="card mt-4">
        <div class="card-header">Jumlah Produk Terjual per Kategori per Tahun</div>
        <div class="card-body">
            @if(count($column['series']) === 1 && $column['series'][0]['name'] === 'Data Tidak Tersedia')
                <div class="alert alert-warning">Data penjualan produk belum tersedia.</div>
            @endif
            <div id="columnChart"></div>
        </div>
    </div>
</div>
@endsection

@section('js')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Pie Chart
        Highcharts.chart('pieChart', {
            chart: {
                type: 'pie'
            },
            title: {
                text: 'Produk Berdasarkan Kategori'
            },
            series: [{
                name: 'Jumlah',
                colorByPoint: true,
                data: {!! json_encode($pie) !!}
            }]
        });

        // Line Chart
        Highcharts.chart('columnChart', {
            chart: {
                type: 'column'
            },
            title: {
                text: 'Prevalensi Stunting per Kelurahan'
            },
            xAxis: {
                categories: {!! json_encode($line['categories']) !!}
            },
            yAxis: {
                title: {
                    text: 'Prevalensi (%)'
                }
            },
            series: [{
                name: 'Prevalensi EPPGBM',
                data: {!! json_encode($line['data']) !!}
            }]
        });

        // Column Chart
        Highcharts.chart('lineChart', {
            chart: {
                type: 'line'
            },
            title: {
                text: 'Jumlah Produk Terjual per Kategori per Tahun'
            },
            xAxis: {
                categories: {!! json_encode($column['categories']) !!},
                crosshair: true
            },
            yAxis: {
                min: 0,
                title: {
                    text: 'Jumlah Produk'
                }
            },
            series: {!! json_encode(array_values($column['series'])) !!}
        });
    });
</script>
@endsection
