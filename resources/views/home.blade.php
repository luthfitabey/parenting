@extends('adminlte::page')

@section('title', 'PARENTING home')

@section('content_header')
    <h1 class="m-0 text-dark">Dashboard</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <p class="mb-0">You are logged in as user!</p>
                    <a href="{{ route('peta.stunting') }}" class="btn btn-primary mt-3">Lihat Peta Stunting</a>
                </div>
            </div>
        </div>
    </div>
@stop
