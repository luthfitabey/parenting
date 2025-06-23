@extends('adminlte::page')

@section('title', 'Peta Stunting')

@section('content_header')
    <h1>Peta Stunting Kota Mojokerto</h1>
@stop

@section('content')
    <div id="map" style="height: 500px;"></div>

    <script>
        var map = L.map('map').setView([-7.4723, 112.4343], 13); // Koordinat Mojokerto

        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; OpenStreetMap contributors'
        }).addTo(map);

        // Contoh data kelurahan dengan jumlah stunting
        var kelurahanData = [
            { name: "Kelurahan 1", lat: -7.4700, lon: 112.4320, jumlah: 15, persentase: 12.5 },
            { name: "Kelurahan 2", lat: -7.4750, lon: 112.4370, jumlah: 25, persentase: 18.9 },
        ];

        kelurahanData.forEach(function(data) {
            L.marker([data.lat, data.lon])
                .addTo(map)
                .bindPopup("<b>" + data.name + "</b><br>Jumlah Stunting: " + data.jumlah + "<br>Persentase: " + data.persentase + "%");
        });
    </script>
@stop
