@extends('adminlte::page')

@section('title', 'Edit Kecamatan')

@section('content_header')
    <h1 class="m-0 text-dark">Edit Kecamatan</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('kecamatans.update', $kecamatan->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="kode">Kode Kecamatan</label>
                            <input 
                                type="text" 
                                class="form-control @error('kode') is-invalid @enderror" 
                                id="kode" 
                                name="kode" 
                                value="{{ old('kode', $kecamatan->kode) }}" 
                                placeholder="Enter Kode Kecamatan"
                            >
                            @error('kode')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="nama">Nama Kecamatan</label>
                            <input 
                                type="text" 
                                class="form-control @error('nama') is-invalid @enderror" 
                                id="nama" 
                                name="nama" 
                                value="{{ old('nama', $kecamatan->nama) }}" 
                                placeholder="Enter Nama Kecamatan"
                            >
                            @error('nama')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('kecamatans.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop