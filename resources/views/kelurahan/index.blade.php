@extends('adminlte::page')

@section('title', 'List Kelurahan')

@section('content_header')
    <h1 class="m-0 text-dark">List Kelurahan</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <a href="{{route('kelurahans.create')}}" class="btn btn-primary mb-2">
                        Tambah
                    </a>

                    <table class="table table-hover table-bordered table-stripped" id="example2">
                        <thead>
                        <tr>
                            <th>No.</th>
                            <th>kode</th>
                            <th>Kelurahan</th>
                            <th>Kecamatan</th>
                            <th>Opsi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($kelurahans as $key => $kelurahan)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$kelurahan->kode}}</td>
                                <td>{{$kelurahan->nama}}</td>
                                <td>{{ $kelurahan->kecamatan->nama }}</td> <!-- Display related kecamatan name -->
                                <td>
                                    <a href="{{route('kelurahans.edit', $kelurahan->id)}}" class="btn btn-primary btn-xs">
                                        Edit
                                    </a>
                                    <a href="{{route('kelurahans.destroy', $kelurahan->id)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@stop

@push('js')
    <form action="" id="delete-form" method="post">
        @method('delete')
        @csrf
    </form>
    <script>
        $('#example2').DataTable({
            "responsive": true,
        });

        function notificationBeforeDelete(event, el) {
            event.preventDefault();
            if (confirm('Apakah anda yakin akan menghapus data ? ')) {
                $("#delete-form").attr('action', $(el).attr('href'));
                $("#delete-form").submit();
            }
        }

    </script>
@endpush