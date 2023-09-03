@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-3 text-center">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Trabajos </h5>
                <p class="card-text">Cantidad de trabajos: {{ $jobs }}</p>

            </div>
        </div>
    </div>
    <div class="col-md-3 text-center">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Categorias</h5>

                <p class="card-text">Cantidad de categorias: {{ $categories }}</p>

            </div>
        </div>
    </div>
    <div class="col-md-3 text-center">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Administradores</h5>

                <p class="card-text">Cantidad de administradores: {{ $admins }}</p>

            </div>
        </div>
    </div>
    <div class="col-md-3 text-center">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Aplicaciones</h5>

                <p class="card-text">Cantidad de vacantes aplicadas: {{ $applications }}</p>

            </div>
        </div>
    </div>
</div>
@endsection
