@extends('adminlte::page')

@section('title', 'Edit Prevalensi Stunting')

@section('content_header')
    <h1>Edit Prevalensi Stunting</h1>
@stop

@section('content')
    <form action="{{ route('prevalensis.update', $prev_stunting->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label>Kelurahan</label>
            <select name="kelurahan_id" id="kelurahan_id" class="form-control" required>
                <option value="">-- Pilih Kelurahan --</option>
                @foreach($kelurahans as $kelurahan)
                    <option value="{{ $kelurahan->id }}" 
                        data-balita-total="{{ $kelurahan->total_balita }}" 
                        data-balita-stunting="{{ $kelurahan->balita_stunting }}">
                        {{ $kelurahan->nama }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label>Prevalensi EPPGBM (%)</label>
            <input type="number" step="0.01" id="prevalensi_eppgbm" name="prevalensi_eppgbm" class="form-control" value="{{ $prev_stunting->prevalensi_eppgbm }}" readonly>
        </div>
        <div class="form-group">
            <label>Prevalensi SKI (%)</label>
            <input type="number" name="prevalensi_ski" class="form-control" step="0.01" value="{{ $prev_stunting->prevalensi_ski }}" required>
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
@stop
