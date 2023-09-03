@extends('layouts.app')

@section('content')




    <section class="section-hero overlay inner-page bg-image" style="background-image: url('{{ asset('assets/images/hero_1.jpg')}}" id="home-section">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1 class="text-white font-weight-bold">Actualizar datos</h1>
                <div class="custom-breadcrumbs">
                    <a href="#">Inicio</a> <span class="mx-2 slash">/</span>
                    <a href="#">Mi Perfil</a> <span class="mx-2 slash">/</span>
                    <span class="text-white"><strong>Mis Datos</strong></span>
                </div>
            </div>
        </div>
    </div>
</section>

    <div class="container">
        @if(\Session::has('update'))
            <div class="alert alert-success">
                <p> {!! \Session::get('update') !!} </p>
            </div>
        @endif
    </div>


<section class="site-section">
    <div class="container">

        <div class="row align-items-center mb-5">
            <div class="col-lg-8 mb-4 mb-lg-0">
                <div class="d-flex align-items-center">
                    <div>
                        <h2>Actualizar datos</h2>
                    </div>
                </div>
            </div>

        </div>
        <div class="row mb-5">
            <div class="col-lg-12">
                <form class="p-4 p-md-5 border rounded" action="{{ route('update.details') }}" method="post">

                   @csrf

                    @if( $errors -> has('name'))
                        <p class="alert alert-success">{{ $errors->first('name') }}</p>
                    @endif
                    <div class="form-group">
                        <label for="job-title">Nombre</label>
                        <input type="text" value="{{ $userDetails -> name }}" name="name" class="form-control" id="job-title" placeholder="Ingresa tu nombre">
                    </div>

                    @if( $errors -> has('titulo_trabajo'))
                        <p class="alert alert-success">{{ $errors->first('titulo_trabajo') }}</p>
                    @endif
                    <div class="form-group">
                        <label for="job-title">Area de trabajo</label>
                        <input type="text" value="{{ $userDetails -> titulo_trabajo }}" name="titulo_trabajo" class="form-control" id="job-title" placeholder="Ingresa tu area de trabajo">
                    </div>

                    @if( $errors -> has('bio'))
                        <p class="alert alert-success">{{ $errors->first('bio') }}</p>
                    @endif
                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="text-black" for="">Descripcion Perfil</label>
                            <textarea name="bio"  id="" cols="30" rows="7" class="form-control" placeholder="Ingresa tu descripcion"> {{ $userDetails -> bio }}</textarea>
                        </div>
                    </div>

                    @if( $errors -> has('facebook'))
                        <p class="alert alert-success">{{ $errors->first('titulo_trabajo') }}</p>
                    @endif
                    <div class="form-group">
                        <label for="job-title">Facebook</label>
                        <input type="text" value="{{ $userDetails -> facebook }}" name="facebook" class="form-control" id="facebook" placeholder="Enlace de tu Facebook">
                    </div>

                    @if( $errors -> has('twitter'))
                        <p class="alert alert-success">{{ $errors->first('twitter') }}</p>
                    @endif
                    <div class="form-group">
                        <label for="job-title">Twitter</label>
                        <input type="text" value="{{ $userDetails -> twitter }}" name="twitter" class="form-control" id="twitter" placeholder="Enlace de tu Twitter">
                    </div>

                    @if( $errors -> has('linkedin'))
                        <p class="alert alert-success">{{ $errors->first('linkedin') }}</p>
                    @endif
                    <div class="form-group">
                        <label for="job-title">LinkedIn</label>
                        <input type="text" value="{{ $userDetails -> linkedin }}" name="linkedin" class="form-control" id="linkedin" placeholder="Enlace de tu LinkedIn">
                    </div>


                    <div class="col-lg-4 ml-auto">
                        <div class="row">
                            <div class="col-6">
                                <input type="submit" name="submit" class="btn btn-block btn-primary btn-md" style="margin-left: 200px;" value="Guardar Modificaciones">
                            </div>
                        </div>
                    </div>




                </form>
            </div>


        </div>

    </div>
</section>


@endsection
