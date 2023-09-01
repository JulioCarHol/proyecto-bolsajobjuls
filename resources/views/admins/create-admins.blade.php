@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-5 d-inline">Crear Cuenta de Administrador</h5>
                <form method="POST" action=" {{ route('store.admins') }} " enctype="multipart/form-data">

                    @csrf
                    @if( $errors -> has('email'))
                        <p class="alert alert-danger">{{ $errors->first('email') }}</p>
                    @endif
                    <div class="form-outline mb-4 mt-4">
                        <input type="email" name="email" id="form2Example1" class="form-control" placeholder="Correo Electronico"/>
                    </div>

                    @if( $errors -> has('name'))
                        <p class="alert alert-danger">{{ $errors->first('name') }}</p>
                    @endif
                    <div class="form-outline mb-4">
                        <input type="text" name="name" id="form2Example1" class="form-control"
                               placeholder="Usuario"/>
                    </div>

                    @if( $errors -> has('password'))
                        <p class="alert alert-danger">{{ $errors->first('password') }}</p>
                    @endif
                    <div class="form-outline mb-4">
                        <input type="password" name="password" id="form2Example1" class="form-control"
                               placeholder="Contraseña"/>
                    </div>

                    <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Crear cuenta</button>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
