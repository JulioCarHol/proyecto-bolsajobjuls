@extends('layouts.admin')
@section('content')

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    @if(\Session::has('create'))
                        <div class="alert alert-success">
                            <p> {!! \Session::get('create') !!} </p>
                        </div>
                    @endif
                    @if(\Session::has('delete'))
                        <div class="alert alert-danger">
                            <p> {!! \Session::get('delete') !!} </p>
                        </div>
                    @endif
                    <h5 class="card-title mb-4 d-inline">Lista de empleos</h5>
                    <a href="{{ route('create.jobs') }}" class="btn btn-primary mb-4 text-center float-right">Crear un
                        Empleo</a>

                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Cargo</th>
                            <th scope="col">Categoria</th>
                            <th scope="col">Jornada</th>
                            <th scope="col">Empresa</th>
                            <th scope="col">Ubicacion</th>
                            <th scope="col">Eliminar</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach( $jobs as $job )
                            <tr>
                                <th scope="row">{{ $job -> id }}</th>
                                <td>{{ $job -> titulo_trabajo }}</td>
                                <td>{{ $job -> categoria }}</td>
                                <td>{{ $job -> tipo_trabajo }}</td>
                                <td>{{ $job -> empresa }}</td>
                                <td>{{ $job -> region_trabajo }}</td>
                                <td><a href="{{ route('delete.jobs', $job -> id) }}" class="btn btn-danger  text-center "> Eliminar </a></td>


                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
