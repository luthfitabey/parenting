@extends('adminlte::page')
@section('content')
<form action="{{ route('stuntings.store') }}" method="POST">
    @csrf
    <div class="form-group">
        <label>Nama Balita</label>
        <select name="balita_id" class="form-control">
            @foreach($balitas as $balita)
                <option value="{{ $balita->id }}">{{ $balita->nama }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>Stunting</label>
        <select name="isStunting" class="form-control">
            <option value="1">Ya</option>
            <option value="0">Tidak</option>
        </select>
    </div>
    <div class="form-group">
        <label>Bulan Timbang</label>
        <select name="bulan_timbang" class="form-control">
            @foreach($months as $month)
                <option value="{{ $month }}">{{ $month }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-success">Simpan</button>
</form>
@endsection
