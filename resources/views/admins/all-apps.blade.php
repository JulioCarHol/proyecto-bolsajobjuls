@extends('layouts.admin')
@section('content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    @if(\Session::has('delete'))
                        <div class="alert alert-success">
                            <p> {!! \Session::get('delete') !!} </p>
                        </div>
                    @endif
                    <h5 class="card-title mb-4 d-inline">Empleos Aplicados</h5>

                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">CV</th>
                            <th scope="col">Información</th>
                            <th scope="col">Titulo Trabajo</th>
                            <th scope="col">Empresa</th>
                            <th scope="col">Correo Electrónico</th>
                            <th scope="col">Borrar</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach( $apps as $app)
                            <tr>
                                <th scope="row">1</th>
                                <td><a class="btn btn-success" href="{{ asset('assets/cvs/'.$app->cv) }}">CV</a></td>
                                <td><a class="btn btn-success" href="{{ route('single.job', $app->job_id) }}">Informacion</a></td>
                                <td> {{ $app -> titulo_trabajo}} </td>
                                <td> {{ $app -> empresa}} </td>
                                <td> {{ $app -> email}} </td>
                                <td><a href="{{route('delete.applications', $app->id)}}" class="btn btn-danger  text-center ">Eliminar</a></td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
