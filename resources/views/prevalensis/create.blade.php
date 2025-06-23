@extends('adminlte::page')

@section('title', 'Tambah Prevalensi Stunting')

@section('content_header')
    <h1>Tambah Prevalensi Stunting</h1>
@stop

@section('content')
    <form action="{{ route('prevalensis.store') }}" method="POST">
        @csrf
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
            <input type="number" step="0.01" id="prevalensi_eppgbm" name="prevalensi_eppgbm" class="form-control" readonly>
        </div>
        <div class="form-group">
            <label>Prevalensi SKI (%)</label>
            <input type="number" step="0.01" name="prevalensi_ski" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
@stop

@push('js')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const kelurahanSelect = document.getElementById("kelurahan_id");
            const prevalensiEppgbmInput = document.getElementById("prevalensi_eppgbm");

            kelurahanSelect.addEventListener("change", function() {
                const selectedOption = this.options[this.selectedIndex];
                const totalBalita = parseInt(selectedOption.getAttribute("data-balita-total")) || 0;
                const balitaStunting = parseInt(selectedOption.getAttribute("data-balita-stunting")) || 0;

                const prevalensiEppgbm = totalBalita > 0 ? (balitaStunting / totalBalita) * 100 : 0;
                prevalensiEppgbmInput.value = prevalensiEppgbm.toFixed(2);
            });
        });
    </script>
@endpush
