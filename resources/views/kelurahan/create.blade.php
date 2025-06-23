@extends('adminlte::page')

@section('title', 'Tambah Kelurahan')

@section('content_header')
    <h1 class="m-0 text-dark">Tambah Kelurahan</h1>
@stop

@section('style-css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

@section('content')
    <!-- <div class="container"> -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">Tambah Kelurahan</div>
                    <div class="card-body">
                        {{-- action form yang mengarah ke route kelurahan.store untuk proses penyimpanan data --}}
                        <form action="{{ route('kelurahans.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group mb-3">
                                <label for="">Kode Kelurahan Kemendagri</label>
                                <input type="text" name="kode" class="form-control @error('kode') is-invalid @enderror" id="kode">
                                @error('kode')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="">Nama Kelurahan</label>
                                <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama">
                                @error('nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                            <label for="">Kecamatan</label>
                                <select name="kecamatan_id" class="form-control @error('kecamatan_id') is-invalid @enderror">
                                    @foreach($kecamatans as $kecamatan)
                                        <option value="{{ $kecamatan->id }}">{{ $kecamatan->nama }}</option>
                                    @endforeach
                                </select>
                                @error('kecamatan_id')
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
@endsection

