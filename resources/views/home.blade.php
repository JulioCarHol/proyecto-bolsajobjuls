@extends('layouts.app')

@section('content')
    {{--
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
--}}


    <section class="home-section section-hero overlay bg-image"
             style="margin-top: -24px; background-image: url({{ asset("assets/images/hero_1.jpg")}});"
             id="home-section">

        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-12">
                    <div class="mb-5 text-center">
                        <h1 class="text-white font-weight-bold">Bolsa de empleos en el sector TI</h1>
                        <p>Plataforma sencilla pero con lo necesario para encontrar su empleo de forma segura</p>
                    </div>

                    <form method="post" action="{{ route('search.job') }}" class="search-jobs-form">
                        @csrf
                        <div class="row mb-5">
                            <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                                <input name="titulo_trabajo" type="text" class="form-control form-control-lg">
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                                <select name="region_trabajo" class="selectpicker" data-style="btn-white btn-lg" data-width="100%"
                                        data-live-search="true" title="Departamentos">
                                    <option value="Amazonas">Amazonas</option>
                                    <option value="Antioquia">Antioquia</option>
                                    <option value="Arauca">Arauca</option>
                                    <option value="Atlántico">Atlántico</option>
                                    <option value="Bolívar">Bolívar</option>
                                    <option value="Boyacá">Boyacá</option>
                                    <option value="Caquetá">Caquetá</option>
                                    <option value="Casanare">Casanare</option>
                                    <option value="Cauca">Cauca</option>
                                    <option value="Cesar">Cesar</option>
                                    <option value="Chocó">Chocó</option>
                                    <option value="Córdoba">Córdoba</option>
                                    <option value="Cundinamarca">Cundinamarca</option>
                                    <option value="Guainía">Guainía</option>
                                    <option value="Guaviare">Guaviare</option>
                                    <option value="Huila">Huila</option>
                                    <option value="La Guajira">La Guajira</option>
                                    <option value="Magdalena">Magdalena</option>
                                    <option value="Meta">Meta</option>
                                    <option value="Nariño">Nariño</option>
                                    <option value="Norte de Santander">Norte de Santander</option>
                                    <option value="Putumayo">Putumayo</option>
                                    <option value="Quindío">Quindío</option>
                                    <option value="Risaralda">Risaralda</option>
                                    <option value="Santander">Santander</option>
                                    <option value="Sucre">Sucre</option>
                                    <option value="Tolima">Tolima</option>
                                    <option value="Valle del Cauca">Valle del Cauca</option>
                                    <option value="Vaupés">Vaupés</option>
                                    <option value="Vichada">Vichada</option>
                                    <option value="PHP">PHP</option>
                                </select>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                                <select name="tipo_trabajo" class="selectpicker" data-style="btn-white btn-lg" data-width="100%"
                                        data-live-search="true" title="Tipo de Jornada">
                                    <option> Tiempo Completo </option>
                                    <option> Medio Tiempo </option>
                                    <option> Freelancer </option>
                                    <option> Por Horas </option>
                                </select>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                                <button name="submit" type="submit" class="btn btn-primary btn-lg btn-block text-white btn-search">
                                    <span class="icon-search icon mr-2"></span>Buscar
                                </button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12 popular-keywords">
                                <h3>Mas buscados:</h3>
                                <ul class="keywords list-unstyled m-0 p-0">
                                    @foreach( $duplicates as $duplicate)
                                        <li><a href="#" class=""> {{ $duplicate -> keyword }}</a></li>

                                    @endforeach


                                </ul>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <a href="#next" class="scroll-button smoothscroll">
            <span class=" icon-keyboard_arrow_down"></span>
        </a>

    </section>

    <section class="py-5 bg-image overlay-primary fixed overlay" id="next"
             style="background-image: url({{ asset('assets/images/hero_1.jpg')}});">
        <div class="container">
            <div class="row mb-5 justify-content-center">
                <div class="col-md-7 text-center">
                    <p class="lead text-white">Con un alto número de empleos postulados, demostramos ser una plataforma atractiva para los candidatos en busca de
                        oportunidades profesionales. Además, nuestras vacantes ocupadas muestran la capacidad de
                        conectar a las empresas con talento calificado y asegurar contrataciones exitosas. Por último,
                        nuestro creciente número de empresas registradas resalta la confianza depositada en nosotros
                        como medio para publicar ofertas laborales. Estos indicadores nos posicionan como líderes del
                        mercado al ofrecer una experiencia satisfactoria tanto para los candidatos como para las
                        empresas contratantes.</p>
                </div>
            </div>
            <div class="row pb-0 block__19738 section-counter">
                <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
                    <div class="d-flex align-items-center justify-content-center mb-2">
                        <strong class="number" data-number="20">0</strong>
                    </div>
                    <span class="caption">Candidatos</span>
                </div>

                <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
                    <div class="d-flex align-items-center justify-content-center mb-2">
                        <strong class="number" data-number="{{ $totalJobs }}">0</strong>
                    </div>
                    <span class="caption">Ofertas de empleo</span>
                </div>

                <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
                    <div class="d-flex align-items-center justify-content-center mb-2">
                        <strong class="number" data-number="120">0</strong>
                    </div>
                    <span class="caption">Empleos otorgados</span>
                </div>

                <div class="col-6 col-md-6 col-lg-3 mb-5 mb-lg-0">
                    <div class="d-flex align-items-center justify-content-center mb-2">
                        <strong class="number" data-number="20">0</strong>
                    </div>
                    <span class="caption">Compañias</span>
                </div>
            </div>
        </div>
    </section>



    <section class="site-section">
        <div class="container">

            <div class="row mb-5 justify-content-center">
                <div class="col-md-7 text-center">
                    <h2 class="section-title mb-2">{{ $totalJobs }} OFERTAS ACTUALMENTE</h2>
                </div>
            </div>

            <ul class="job-listings mb-5">
                @foreach($jobs as $job)
                    <li class="job-listing d-block d-sm-flex pb-3 pb-sm-0 align-items-center">
                        <a href="{{ route('single.job', $job -> id)}}"></a>
                        <div class="job-listing-logo">
                            <img src="{{ asset('assets/images/'.$job -> imagen)}}" alt=" " class="img-fluid">
                        </div>
                        <div class="job-listing-about d-sm-flex custom-width w-100 justify-content-between mx-4">
                            <div class="job-listing-position custom-width w-50 mb-3 mb-sm-0">
                                <h2>{{ $job ->  titulo_trabajo }}</h2>
                                <strong>{{ $job ->  empresa }}</strong>
                            </div>
                            <div class="job-listing-location mb-3 mb-sm-0 custom-width w-25">
                                <span class="icon-room"></span> {{ $job ->  region_trabajo }}
                            </div>
                            <div class="job-listing-meta">
                                <span class="badge badge-danger">{{ $job ->  tipo_trabajo }}</span>
                            </div>
                        </div>
                    </li>
                @endforeach

            </ul>

        </div>
    </section>

    <section class="py-5 bg-image overlay-primary fixed overlay" style="background-image: url({{ asset('assets/images/hero_1.jpg') }});">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h2 class="text-white">¿Buscas trabajo?</h2>
                    <p class="mb-0 text-white lead">Aquí tienes la oportunidad para unirte a la comunidad y buscar el empleo que
                        encaje con tu perfil.</p>
                </div>
                <div class="col-md-3 ml-auto">
                    <a href="{{route("register")}}" class="btn btn-info btn-block btn-lg text-white">Registrarse</a>
                </div>
            </div>
        </div>
    </section>


    <section class="site-section py-4">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 text-center mt-4 mb-5">
                    <div class="row justify-content-center">
                        <div class="col-md-7">
                            <h2 class="section-title mb-2"> Empresas que han buscado talentos </h2>
                            <p class="lead"> Descubre algunas empresas destacadas que han estado en busqueda de nuevos talentos</p>
                        </div>
                    </div>

                </div>
                <div class="col-6 col-lg-3 col-md-6 text-center">
                    <img src="{{ asset('assets/images/logo_mailchimp.svg')}}" alt="Image" class="img-fluid logo-1">
                </div>
                <div class="col-6 col-lg-3 col-md-6 text-center">
                    <img src="{{ asset('assets/images/logo_paypal.svg')}}" alt="Image" class="img-fluid logo-2">
                </div>
                <div class="col-6 col-lg-3 col-md-6 text-center">
                    <img src="{{ asset('assets/images/logo_stripe.svg')}}" alt="Image" class="img-fluid logo-3">
                </div>
                <div class="col-6 col-lg-3 col-md-6 text-center">
                    <img src="{{ asset('assets/images/logo_visa.svg')}}" alt="Image" class="img-fluid logo-4">
                </div>
                <div class="col-6 col-lg-3 col-md-6 text-center">
                    <img src="{{ asset('assets/images/logo_apple.svg')}}" alt="Image" class="img-fluid logo-5">
                </div>
                <div class="col-6 col-lg-3 col-md-6 text-center">
                    <img src="{{ asset('assets/images/logo_tinder.svg')}}" alt="Image" class="img-fluid logo-6">
                </div>
                <div class="col-6 col-lg-3 col-md-6 text-center">
                    <img src="{{ asset('assets/images/logo_sony.svg')}}" alt="Image" class="img-fluid logo-7">
                </div>
                <div class="col-6 col-lg-3 col-md-6 text-center">
                    <img src="{{ asset('assets/images/logo_airbnb.svg')}}" alt="Image" class="img-fluid logo-8">
                </div>
            </div>
        </div>
    </section>


    <section class="bg-light pt-5 testimony-full">

        <div class="owl-carousel single-carousel">


            <div class="container">
                <div class="row">
                    <div class="col-lg-6 align-self-center text-center text-lg-left">
                        <blockquote>
                            <p>&ldquo;Turpis duis lacus nisl interdum fusce laoreet curabitur cum eget rutrum, sed venenatis vivamus lobortis sagittis habitasse elementum cubilia dapibus, habitant tempus condimentum dictumst parturient donec feugiat nam aenean. Sociis ligula augue dui quam ut integer himenaeos nunc.&rdquo;</p>
                            <p><cite> &mdash; Corey Woods</cite></p>
                        </blockquote>
                    </div>
                    <div class="col-lg-6 align-self-end text-center text-lg-right">
                        <img src="{{ asset('assets/images/person_transparent.png')}}" alt="Image" class="img-fluid mb-0">
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-lg-6 align-self-center text-center text-lg-left">
                        <blockquote>
                            <p>&ldquo;Rhoncus suspendisse magna lobortis feugiat nisi maecenas sapien id, magnis sed mollis torquent et cubilia faucibus. Ad fringilla curabitur ridiculus mauris erat cubilia massa inceptos conubia bibendum volutpat, donec facilisis turpis netus duis nibh viverra vivamus venenatis aenean, sodales nostra vehicula id quam fusce egestas purus proin morbi.&rdquo;</p>
                            <p><cite> &mdash; Chris Peters </cite></p>
                        </blockquote>
                    </div>
                    <div class="col-lg-6 align-self-end text-center text-lg-right">
                        <img src="{{ asset('assets/images/person_transparent.png')}}" alt="Image"
                             class="img-fluid mb-0">
                    </div>
                </div>
            </div>

        </div>

    </section>

    <section class="pt-5 bg-image overlay-primary fixed overlay"
             style="background-image: url({{ asset('assets/images/hero_1.jpg') }});">
        <div class="container">
            <div class="row">
                <div class=" text-center mb-5 pb-5 pt-5">
                    <h2 class="text-white ">Ahora disponible para dispositivos moviles</h2>
                    <p class="mb-5 lead text-white">Desde la comodidad de tu movil podras estar pendiente de tu empleo deseado.</p>
                    <p class="mb-0">
                        <a href="#" class="btn btn-dark btn-md px-4 border-width-2"><span
                                class="icon-apple mr-3"></span>App Store</a>
                        <a href="#" class="btn btn-dark btn-md px-4 border-width-2"><span
                                class="icon-android mr-3"></span>Play Store</a>
                    </p>
                </div>
            </div>
        </div>
    </section>

@endsection
