@extends('adminlte::page')
@section('content')
<form action="{{ route('stuntings.update', $stunting->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label>Nama Balita</label>
        <select name="balita_id" class="form-control">
            @foreach($balitas as $balita)
                <option value="{{ $balita->id }}" {{ $stunting->balita_id == $balita->id ? 'selected' : '' }}>{{ $balita->nama }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>Stunting</label>
        <select name="isStunting" class="form-control">
            <option value="1" {{ $stunting->isStunting ? 'selected' : '' }}>Ya</option>
            <option value="0" {{ !$stunting->isStunting ? 'selected' : '' }}>Tidak</option>
        </select>
    </div>
    <div class="form-group">
        <label>Bulan Timbang</label>
        <input type="text" name="bulan_timbang" class="form-control" value="{{ $stunting->bulan_timbang }}">
    </div>
    <button type="submit" class="btn btn-success">Update</button>
</form>
@endsection