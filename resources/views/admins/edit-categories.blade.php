@extends('layouts.admin')
@section('content')

    <div class="row w-50 justify-content-center d-flex m-auto">
        <div class="col">
            <div class="card">
                <div class="card-body">

                    <h5 class="card-title mb-5 d-inline">Editar Categorias</h5>
                    <form method="POST" action=" {{ route('update.categories', $category -> id) }}" enctype="multipart/form-data">
                        <!-- Email input -->
                        @csrf

                        @if( $errors -> has('nombre'))
                            <p class="alert alert-danger">{{ $errors->first('nombre') }}</p>
                        @endif
                        <div class="form-outline mb-4 mt-4">
                            <input type="text" name="nombre" id="form2Example1" class="form-control"
                                   placeholder="name" value="{{ $category-> nombre }}"/>

                        </div>



                        <!-- Submit button -->
                        <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">Actualizar</button>


                    </form>

                </div>
            </div>
        </div>
    </div>
@endsection
