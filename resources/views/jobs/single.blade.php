@extends('layouts.app')

@section('content')

    <!-- HOME -->
    <section class="section-hero overlay inner-page bg-image"
             style="background-image: url('{{ asset('assets/images/hero_1.jpg') }}'); margin-top: -25px"
             id="home-section">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <h1 class="text-white font-weight-bold">Vacante Disponible</h1>
                    <div class="custom-breadcrumbs">
                        <a href="#">Inicio</a> <span class="mx-2 slash">/</span>
                        <a href="#">Trabajos</a> <span class="mx-2 slash">/</span>
                        <span class="text-white"><strong>{{ $job -> titulo_trabajo }}</strong></span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="container">
        @if(\Session::has('save'))
            <div class="alert alert-success">
                <p> {!! \Session::get('save') !!} </p>
            </div>
        @endif
    </div>

    <div class="container">
        @if(\Session::has('apply'))
            <div class="alert alert-success">
                <p> {!! \Session::get('apply') !!} </p>
            </div>
        @endif
    </div>

    <div class="container">
        @if(\Session::has('applied'))
            <div class="alert alert-success">
                <p> {!! \Session::get('applied') !!} </p>
            </div>
        @endif
    </div>

    <section class="site-section">
        <div class="container">
            <div class="row align-items-center mb-5">
                <div class="col-lg-8 mb-4 mb-lg-0">
                    <div class="d-flex align-items-center">
                        <div class="border p-2 d-inline-block mr-3 rounded">
                            <img src="{{ asset('assets/images/job_logo_5.jpg') }}" alt="Image">
                        </div>
                        <div>
                            <h2>{{ $job -> titulo_trabajo  }}</h2>
                            <div>
                                <span class="ml-0 mr-2 mb-2"><span class="icon-briefcase mr-2"></span>{{ $job -> empresa  }}</span>
                                <span class="m-2"><span
                                        class="icon-room mr-2"></span>{{ $job -> region_trabajo }}</span>
                                <span class="m-2"><span class="icon-clock-o mr-2"></span><span
                                        class="text-primary">{{  $job -> tipo_trabajo }}</span></span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-8">
                        <div class="mb-5">
                            <figure class="mb-5"><img src="{{ asset('assets/images/job_single_img_1.jpg ') }}"
                                                      alt="Image"
                                                      class="img-fluid rounded"></figure>
                            <h3 class="h5 d-flex align-items-center mb-4 text-primary text-center"><span
                                    class="icon-align-left mr-3"></span>Descripción</h3>
                            <p>{{ $job -> descripcion_trabajo }}</p>

                        </div>
                        <div class="mb-5">
                            <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span
                                    class="icon-rocket mr-3"></span>Responsabilidades</h3>
                            <p>
                                {{ $job -> responsabilidades }}
                            </p>

                        </div>

                        <div class="mb-5">
                            <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span
                                    class="icon-book mr-3"></span>Educación y Experiencia</h3>
                            <p>
                                {{ $job -> educacion_experiencia }}
                            </p>
                        </div>

                        <div class="mb-5">
                            <h3 class="h5 d-flex align-items-center mb-4 text-primary"><span
                                    class="icon-turned_in mr-3"></span>Otros beneficios</h3>
                            <p>
                                {{ $job -> otrosbeneficios }}
                            </p>
                        </div>

                        <div class="row mb-5">
                            <div class="col-6">
                                @if( isset(Auth::user()->id))
                                <form action="{{ route('save.job' )}}" method="POST">
                                    @csrf
                                    <input name="job_id" type="hidden" value="{{ $job -> id }}">
                                    <input name="user_id" type="hidden" value="{{ Auth::user()->id }}">
                                    <input name="imagen" type="hidden" value="{{ $job -> imagen }}">
                                    <input name="titulo_trabajo" type="hidden" value="{{ $job -> titulo_trabajo }}">
                                    <input name="region_trabajo" type="hidden" value="{{ $job -> region_trabajo }}">
                                    <input name="tipo_trabajo" type="hidden" value="{{ $job -> tipo_trabajo }}">
                                    <input name="empresa" type="hidden" value="{{ $job -> empresa}}">

                                    @if( $savedJob > 0 )
                                        <button class="btn btn-block btn-light btn-md" disabled></i> Haz guardado este
                                            empleo
                                        </button>

                                    @else
                                        <button name="submit" type="submit" class="btn btn-block btn-light btn-md"></id>Guardar
                                            empleo
                                        </button>
                                    @endif
                                </form>
                                @endif
                            </div>


                            <div class="col-6">
                                <form action="{{ route('apply.job' )}}" method="POST">
                                    @csrf
                                    <input name="job_id" type="hidden" value="{{ $job -> id }}">,
                                    <input name="imagen" type="hidden" value="{{ $job -> imagen }}">
                                    <input name="titulo_trabajo" type="hidden" value="{{ $job -> titulo_trabajo }}">
                                    <input name="region_trabajo" type="hidden" value="{{ $job -> region_trabajo }}">
                                    <input name="tipo_trabajo" type="hidden" value="{{ $job -> tipo_trabajo }}">
                                    <input name="empresa" type="hidden" value="{{ $job -> empresa}}">

                                    @if( isset(Auth::user()->id))
                                        @if( $appliedJob > 0 )
                                            <button class="btn btn-block btn-primary btn-md col-9" disabled> Haz
                                                solicitado este empleo
                                            </button>

                                        @else
                                            <button name="submit" type="submit"
                                                    class="btn btn-block btn-primary btn-md col-9">Aplicar Ahora
                                            </button>
                                        @endif
                                    @else
                                        <a href="{{ route('login') }}" class="btn btn-block btn-primary btn-md col-9">
                                            Iniciar Sesión
                                        </a>
                                    @endif
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4">
                        <div class="bg-light p-3 border rounded mb-4">
                            <h3 class="text-primary  mt-3 h5 pl-3 mb-3 ">Descripción del puesto</h3>
                            <ul class="list-unstyled pl-3 mb-0">
                                <li class="mb-2"><strong class="text-black">Publicado en:</strong> {{ date('Y-m-d', strtotime( $job -> fecha_creacion )) }}</li>
                                <li class="mb-2"><strong class="text-black">Vacante:</strong> {{ $job ->  vacante }}</li>
                                <li class="mb-2"><strong class="text-black">Jornada:</strong> {{ $job ->  tipo_trabajo }}</li>
                                <li class="mb-2"><strong class="text-black">Experiencia:</strong> {{ $job ->  experiencia }}</li>
                                <li class="mb-2"><strong class="text-black">Lugar de trabajo:</strong> {{ $job ->  region_trabajo }}</li>
                                <li class="mb-2"><strong class="text-black">Salario:</strong> {{ $job ->  salario }}</li>
                                <li class="mb-2"><strong class="text-black">Genero:</strong> {{ $job ->  genero }}</li>
                                <li class="mb-2"><strong class="text-black">Plazo solicitud: </strong> {{ date('Y-m-d', strtotime( $job -> fecha_creacion . ' +15 days')) }}
                                </li>
                            </ul>
                        </div>


                        <div class="bg-light p-3 border rounded m-5">
                            <h3 class="text-primary mt-2 h5 pl-3 mb-3 "> Categorias </h3>
                            <ul class="list-unstyled pl-3 mb-0">
                                @foreach( $categories as $category )
                                    <li class="mb-2 text-decoration-none"><a href="{{ route('categories.single', $category -> nombre) }}">{{ $category -> nombre }} ({{ $category -> total }})</a> </li>



                                @endforeach
                            </ul>
                        </div>


                        <div class="bg-light p-3 border rounded">
                            <h3 class="text-primary  mt-3 h5 pl-3 mb-3 ">Compartir</h3>
                            <div class="px-3">
                                <a href="https://www.facebook.com/" class="pt-3 pb-3 pr-3 pl-0" target="_blank"><span
                                        class="icon-facebook"></span></a>
                                <a href="https://twitter.com/" class="pt-3 pb-3 pr-3 pl-0" target="_blank"><span
                                        class="icon-twitter"></span></a>
                                <a href="https://www.linkedin.com/" class="pt-3 pb-3 pr-3 pl-0" target="_blank"><span
                                        class="icon-linkedin"></span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="site-section" id="next">
        <div class="container">

            <div class="row mb-5 justify-content-center">
                <div class="col-md-7 text-center">
                    <h2 class="section-title mb-2">{{ $relatedJobsCount }} Trabajos Relacionados</h2>
                </div>
            </div>

            <ul class="job-listings mb-5">

                @foreach( $relatedJobs as $job )
                    <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
                        <a href="{{ route('single.job', $job -> id) }}"></a>
                        <div class="job-listing-logo">
                            <img src="{{ asset('assets/images/'.$job -> imagen) }}" alt="Image" class="img-fluid">
                        </div>

                        <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
                            <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
                                <h2>{{ $job ->  titulo_trabajo}}</h2>
                                <strong>{{ $job -> empresa }}</strong>
                            </div>
                            <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
                                <span class="icon-room"></span> {{ $job ->  region_trabajo}}
                            </div>
                            <div class="job-listing-meta">
                                <span class="badge badge-danger">{{ $job ->  tipo_trabajo}}</span>
                            </div>
                        </div>

                    </li>
                @endforeach
            </ul>


        </div>
    </section>

@endsection
