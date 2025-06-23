@extends('adminlte::page')

@section('title', 'Edit Balita')

@section('content_header')
    <h1>Edit Data Balita</h1>
@stop

@section('content')
    <form action="{{ route('balitas.update', $balita->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ $balita->nama }}" required>
        </div>
        
        <div class="form-group">
            <label>Tanggal Lahir</label>
            <input type="date" name="tgl_lahir" class="form-control" value="{{ $balita->tgl_lahir }}" required>
        </div>
        
        <div class="form-group">
            <label>Tinggi Badan (cm)</label>
            <input type="number" name="tinggi_badan" class="form-control" value="{{ $balita->tinggi_badan }}" required>
        </div>
        
        <div class="form-group">
            <label>Massa Badan (kg)</label>
            <input type="number" name="massa_badan" class="form-control" value="{{ $balita->massa_badan }}" required>
        </div>

        <div class="mb-3">
            <label for="alamat_lengkap" class="form-label">Alamat Lengkap</label>
             <textarea name="alamat_lengkap" id="alamat_lengkap" class="form-control" required>{{ old('alamat_lengkap', $balita->alamat_lengkap ?? '') }}</textarea>
        </div>
        
        <div class="form-group">
            <label>Kelurahan</label>
            <select name="kelurahan_id" class="form-control">
                @foreach($kelurahans as $kelurahan)
                    <option value="{{ $kelurahan->id }}" {{ $balita->kelurahan_id == $kelurahan->id ? 'selected' : '' }}>
                        {{ $kelurahan->nama }}
                    </option>
                @endforeach
            </select>
        </div>
    
        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('balitas.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@stop
