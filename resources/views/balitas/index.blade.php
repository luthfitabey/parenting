@extends('adminlte::page')

@section('title', 'Data Balita')

@section('content_header')
    <h1>Data Balita</h1>
@stop

@section('content')
    <a href="{{ route('balitas.create') }}" class="btn btn-primary mb-3">Tambah Data</a>

    <table class="table table-bordered table-striped" id="example2">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama</th>
                <th>Tanggal Lahir</th>
                <th>Tinggi Badan (cm)</th>
                <th>Massa Badan (kg)</th>
                <th>Alamat Lengkap</th>
                <th>Kelurahan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($balitas as $key => $balita)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $balita->nama }}</td>
                    <td>{{ $balita->tgl_lahir }}</td>
                    <td>{{ $balita->tinggi_badan }} cm</td>
                    <td>{{ $balita->massa_badan }} kg</td>
                    <td>{{ $balita->alamat_lengkap }}</td>
                    <td>{{ $balita->kelurahan->nama }}</td>
                    <td>
                        <a href="{{ route('balitas.edit', $balita->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('balitas.destroy', $balita->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </thead>
        <tbody>
        </tbody>
    </table>
@stop

@push('js')
    <script>
        $(document).ready(function () {
            $('#example2').DataTable({
                "responsive": true,
                "autoWidth": false
            });
        });
    </script>
@endpush
