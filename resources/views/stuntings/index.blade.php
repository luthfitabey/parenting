@extends('adminlte::page')

@section('title', 'Data Balita Stunting')

@section('content_header')
    <h1>Data Balita Stunting</h1>
@stop

@section('content')
    <a href="{{ route('stuntings.create') }}" class="btn btn-primary mb-3">Tambah Data</a>
    <table class="table table-bordered table-striped" id="example2">
        <thead>
            <tr>
                <th>No.</th>
                <th>Nama Balita</th>
                <th>Stunting</th>
                <th>Bulan Timbang</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($stuntings as $key => $stunting)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $stunting->balita->nama }}</td>
                    <td>{{ $stunting->isStunting ? 'Ya' : 'Tidak' }}</td>
                    <td>{{ $stunting->bulan_timbang }}</td>
                    <td>
                        <a href="{{ route('stuntings.edit', $stunting->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('stuntings.destroy', $stunting->id) }}" method="POST" class="d-inline">
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
