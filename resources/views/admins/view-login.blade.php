@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mt-5">Iniciar Sesión</h5>
                <form method="POST" class="p-auto" action=" {{ route('check.login')}}">
                    <!-- Email input -->
                    @csrf
                    <div class="form-outline mb-4">
                        <input type="email" name="email" id="form2Example1" class="form-control" placeholder="Correo Electrónico" />

                    </div>


                    <!-- Password input -->
                    <div class="form-outline mb-4">
                        <input type="password" name="password" id="form2Example2" placeholder="Contraseña" class="form-control" />

                    </div>



                    <!-- Submit button -->
                    <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Iniciar Sesión</button>


                </form>

            </div>
        </div>
    </div>
</div>
@endsection
