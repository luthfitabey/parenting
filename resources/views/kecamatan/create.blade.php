@extends('adminlte::page')

@section('title', 'Tambah Kecamatan')

@section('content_header')
    <h1 class="m-0 text-dark">Tambah Kecamatan</h1>
@stop

@section('style-css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@section('content')
    <!-- <div class="container"> -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">Tambah Kecamatan</div>
                    <div class="card-body">
                        {{-- action form yang mengarah ke route kecamatan.store untuk proses penyimpanan data --}}
                        <form action="{{ route('kecamatans.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="">Kode kecamatan Kemendagri</label>
                                <input type="text" name="kode" class="form-control @error('kode') is-invalid @enderror" id="">
                                @error('kode')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Nama kecamatan</label>
                                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="">
                                @error('nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <!-- </div> -->
@endsection

