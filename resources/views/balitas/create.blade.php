@extends('adminlte::page')

@section('title', 'Tambah Balita')

@section('content_header')
    <h1>Tambah Data Balita</h1>
@stop

@section('content')
    <form action="{{ route('balitas.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Tanggal Lahir</label>
            <input type="date" name="tgl_lahir" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Tinggi Badan (cm)</label>
            <input type="number" name="tinggi_badan" class="form-control" required min="0">
        </div>
        <div class="form-group">
            <label>Massa Badan (kg)</label>
            <input type="number" name="massa_badan" class="form-control" required min="0">
        </div>
        <div class="form-group">
            <label>Alamat Lengkap</label>
            <textarea name="alamat_lengkap" class="form-control" rows="3" required></textarea>
        </div>
        <div class="form-group">
            <label>Kelurahan</label>
            <select name="kelurahan_id" class="form-control" required>
                <option value="">Pilih Kelurahan</option>
                @foreach($kelurahans as $kelurahan)
                    <option value="{{ $kelurahan->id }}">{{ $kelurahan->nama }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
@stop