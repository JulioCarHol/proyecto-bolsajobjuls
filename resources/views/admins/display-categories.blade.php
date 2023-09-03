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
                    @if(\Session::has('update'))
                        <div class="alert alert-success">
                            <p> {!! \Session::get('update') !!} </p>
                        </div>
                    @endif
                    @if(\Session::has('delete'))
                        <div class="alert alert-success">
                            <p> {!! \Session::get('delete') !!} </p>
                        </div>
                    @endif
                        <div class="d-flex justify-content-sm-between">
                    <h5 class="card-title mb-4 d-inline">Categorias</h5>
                    <a href=" {{ route('create.categories') }}" class="btn btn-primary mb-4 text-center float-right">Crear
                        Categoria</a>
                        </div>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Actualizar</th>
                            <th scope="col">Eliminar</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach( $categories as $category)
                            <tr>
                                <th scope="row">{{ $category -> id}}</th>
                                <td> {{ $category -> nombre}} </td>
                                <td><a href=" {{ route('edit.categories', $category -> id) }}"
                                       class="btn btn-warning text-white text-center "> Actualizar </a></td>
                                <td><a href="{{ route('delete.categories', $category -> id) }}"
                                       class="btn btn-danger  text-center "> Eliminar </a></td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
