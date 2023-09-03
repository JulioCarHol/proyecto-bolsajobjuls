<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'JobJuls') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- CSS-->
    <link rel="stylesheet" href="{{ asset('assets/css/custom-bs.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/jquery.fancybox.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-select.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/icomoon/style.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/line-icons/style.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/quill.snow.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css.map')}}">



    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset ('assets/css/style.css')}}">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
<div id="app">

    <!-- NAVBAR -->
    <header class="site-navbar mt-3">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="site-logo col-6 mt-5"><a href="{{ url('/') }}">JobJuls</a></div>

                <nav class="mx-auto site-navigation">
                    <ul class="site-menu js-clone-nav d-none d-xl-block ml-0 pl-0">
                        <li><a href="{{ url('/') }}" class="nav-link">Inicio</a></li>
                        <li><a href="{{ route('about') }}">Acerca de</a></li>
                        <li><a href="{{ route('contact') }}">Contacto</a></li>
                        </li>
                        @guest
                            @if( Route::has('login'))
                                <li class=""><a href="{{route("login")}}">Iniciar sesión</a></li>
                            @endif
                            @if( Route::has('register'))
                                <li class=""><a href="{{route("register")}}">Registro</a></li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                   data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('profile') }}">Perfil</a>
                                    <a class="dropdown-item" href="{{ route('edit.details') }}">Modificar Perfil</a>
                                    <a class="dropdown-item" href="{{ route('edit.cv') }}">Modificar CV</a>
                                    <a class="dropdown-item" href="{{ route('applications') }}">Aplicaciones</a>
                                    <a class="dropdown-item" href="{{ route('job.saved') }}">Guardados</a>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                        {{ __('Cerrar Sesión') }} </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    </ul>
</div>
</div>
</nav>

<main class="yaldcontent">
    @yield('content')
</main>
</div>

<footer class="site-footer">

    <a href="#top" class="smoothscroll scroll-top">
        <span class="icon-keyboard_arrow_up"></span>
    </a>

    <div class="container">
        <div class="row mb-5">
            <div class="col-6 col-md-3 mb-4 mb-md-0 text-center">
                <h3>Tendencias</h3>
                <ul class="list-unstyled">
                    <li><a href="#">Diseño Web</a></li>
                    <li><a href="#">Diseño Gráfico</a></li>
                    <li><a href="#">Desarrolladores Web</a></li>
                    <li><a href="#">Python</a></li>
                    <li><a href="#">HTML5</a></li>
                    <li><a href="#">CSS3</a></li>
                </ul>
            </div>
            <div class="col-6 col-md-3 mb-4 mb-md-0 text-center">
                <h3>Compañia</h3>
                <ul class="list-unstyled">
                    <li><a href="#">Acerca de nosotros</a></li>
                    <li><a href="#">Blog</a></li>
                    <li><a href="#">Recursos</a></li>
                </ul>
            </div>
            <div class="col-6 col-md-3 mb-4 mb-md-0 text-center">
                <h3>Soporte</h3>
                <ul class="list-unstyled">
                    <li><a href="#">¿Necesitas ayuda?</a></li>
                    <li><a href="#">Privacidad</a></li>
                    <li><a href="#">Terminos y condiciones</a></li>
                </ul>
            </div>
            <div class="col-6 col-md-3 mb-4 mb-md-0 text-center">
                <h3>Contactanos</h3>
                <div class="footer-social">
                    <a href="#"><span class="icon-facebook"></span></a>
                    <a href="#"><span class="icon-twitter"></span></a>
                    <a href="#"><span class="icon-instagram"></span></a>
                    <a href="#"><span class="icon-linkedin"></span></a>
                </div>
            </div>
        </div>

    </div>
</footer>

<!-- Javascript -->
<script src="{{asset('assets/js/jquery.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/js/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('assets/js/stickyfill.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.fancybox.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.easing.1.3.js')}}"></script>
<script src="{{asset('assets/js/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('assets/js/jquery.animateNumber.min.js')}}"></script>
<script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('assets/js/quill.min.js')}}"></script>
<script src="{{asset('assets/js/bootstrap-select.min.js')}}"></script>
<script src="{{asset('assets/js/custom.js')}}"></script>
<script src="{{asset('assets/js/bootstrap.bundle.js.map')}}"></script>



<!--- -->
</body>
</html>
