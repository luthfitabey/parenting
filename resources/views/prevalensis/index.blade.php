@extends('adminlte::page')

@section('title', 'Data Prevalensi Stunting')

@section('content_header')
    <h1>Data Prevalensi Stunting</h1>
@stop

@section('content')
    <a href="{{ route('prevalensis.create') }}" class="btn btn-primary mb-3">Tambah Data</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Kelurahan</th>
                <th>Prevalensi EPPGBM</th>
                <th>Prevalensi SKI</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($prev_stuntings as $index => $prev)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $prev->stunting->balita->kelurahan->nama }}</td>
                    <td>{{ number_format($prev->prevalensi_eppgbm, 2) }}%</td>
                    <td>{{ number_format($prev->prevalensi_ski, 2) }}%</td>
                    <td>
                        <a href="{{ route('prevalensis.edit', $prev->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('prevalensis.destroy', $prev->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@stop
