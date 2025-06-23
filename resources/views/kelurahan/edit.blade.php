@extends('adminlte::page')

@section('title', 'Edit Kelurahan')

@section('content_header')
    <h1 class="m-0 text-dark">Edit Kelurahan</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('kelurahans.update', $kelurahan->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group mb-3">
                            <label for="kode">Kode Kelurahan Kemendagri</label>
                            <input type="text" name="kode" class="form-control @error('kode') is-invalid @enderror" id="kode" value="{{ old('kode', $kelurahan->kode) }}">
                            @error('kode')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="nama">Nama Kelurahan</label>
                            <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" id="nama" value="{{ old('nama', $kelurahan->nama) }}">
                            @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group mb-3">
                            <label for="kecamatan_id">Kecamatan</label>
                            <select name="kecamatan_id" class="form-control @error('kecamatan_id') is-invalid @enderror" id="kecamatan_id">
                                @foreach($kecamatans as $kecamatan)
                                    <option value="{{ $kecamatan->id }}" {{ $kecamatan->id == $kelurahan->kecamatan_id ? 'selected' : '' }}>
                                        {{ $kecamatan->nama }}
                                    </option>
                                @endforeach
                            </select>
                            @error('kecamatan_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('kelurahans.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
