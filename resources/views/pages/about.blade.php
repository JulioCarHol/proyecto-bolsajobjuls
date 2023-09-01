@extends('layouts.app')
@section('content')

    <section class="section-hero overlay inner-page bg-image"
             style="background-image: url({{ asset('assets/images/hero_1.jpg')}});" id="home-section">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <h1 class="text-white font-weight-bold">Acerca de</h1>
                    <div class="custom-breadcrumbs">
                        <a href="{{ route('home') }}">Inicio</a> <span class="mx-2 slash">/</span>
                        <span class="text-white"><strong>Acerca de</strong></span>
                    </div>
                </div>
            </div>
        </div>
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
                        <strong class="number" data-number="20">0</strong>
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


    <section class="site-section pb-0">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <a data-fancybox data-ratio="2" href="https://vimeo.com/3" class="block__96788">
                        <span class="play-icon"><span class="icon-play"></span></span>
                        <img src="{{ asset('assets/images/sq_img_6.jpg')}}" alt="Image" class="img-fluid img-shadow">
                    </a>
                </div>
                <div class="col-lg-5 ml-auto">
                    <h2 class="section-title mb-3">JobJuls</h2>
                    <p class="lead">Eveniet voluptatibus voluptates suscipit minima, cum voluptatum ut dolor, sed facere
                        corporis qui, ea quisquam quis odit minus nulla vitae. Sit, voluptatem.</p>
                    <p>Ipsum harum assumenda in eum vel eveniet numquam, cumque vero vitae enim cupiditate deserunt
                        eligendi officia modi consectetur. Expedita tempora quos nobis earum hic ex asperiores quisquam
                        optio nostrum sit!</p>
                </div>
            </div>
        </div>
    </section>

    <section class="site-section pt-0">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-5 mb-lg-0 order-md-2">
                    <a data-fancybox data-ratio="2" href="https://vimeo.com/3" class="block__96788">
                        <span class="play-icon"><span class="icon-play"></span></span>
                        <img src="{{ asset('assets/images/sq_img_6.jpg')}}" alt="Image" class="img-fluid img-shadow">
                    </a>
                </div>
                <div class="col-lg-5 mr-auto order-md-1  mb-5 mb-lg-0">
                    <h2 class="section-title mb-3">JobJuls</h2>
                    <p class="lead">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                </div>
            </div>
        </div>
    </section>


    <section class="site-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-12 text-center" data-aos="fade">
                    <h2 class="section-title mb-3">Nuestro equipo</h2>
                </div>
            </div>

            <div class="row align-items-center block__69944">

                <div class="col-md-6">
                    <img src="{{ asset('assets/images/person_5.jpg')}}" alt="Image" class="img-fluid mb-4 rounded">
                </div>

                <div class="col-md-6">
                    <h3>Julio Cardenas</h3>
                    <p class="text-muted">Desarrollador</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                    <div class="social mt-4">
                        <a href="#"><span class="icon-facebook"></span></a>
                        <a href="#"><span class="icon-twitter"></span></a>
                        <a href="#"><span class="icon-instagram"></span></a>
                        <a href="#"><span class="icon-linkedin"></span></a>
                    </div>
                </div>

                <div class="col-md-6 order-md-2 ml-md-auto">
                    <img src="{{ asset('assets/images/person_5.jpg')}}" alt="Image" class="img-fluid mb-4 rounded">
                </div>

                <div class="col-md-6">
                    <h3>Julio Cardenas</h3>
                    <p class="text-muted">Desarrollador</p>
                    <p>Soluta quasi cum delectus eum facilis recusandae nesciunt molestias accusantium libero dolores
                        repellat id in dolorem laborum ad modi qui at quas dolorum voluptatem voluptatum repudiandae
                        voluptatibus ut? Ex vel ad explicabo iure ipsa possimus consectetur neque rem molestiae eligendi
                        velit?.</p>
                    <div class="social mt-4">
                        <a href="#"><span class="icon-facebook"></span></a>
                        <a href="#"><span class="icon-twitter"></span></a>
                        <a href="#"><span class="icon-instagram"></span></a>
                        <a href="#"><span class="icon-linkedin"></span></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
