<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Panel de Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('assets/css/styleadmin.css') }}" rel="stylesheet">
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>
<div id="wrapper">
    <nav class="navbar header-top fixed-top navbar-expand-lg  navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('view.login') }}">JobJuls</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
                    aria-controls="navbarText"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse m-auto justify-content-center" id="navbarText">
                @auth('admin')
                <ul class="navbar-nav side-nav text-center ">
                    <li class="nav-item">
                        <a class="nav-link text-white" style="margin-left: 20px;" href="{{ route('admins.dashboard') }}">JobJuls</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('view.admins') }}" style="margin-left: 20px;">Administradores</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('display.categories') }} " style="margin-left: 20px;">Categorias</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href=" {{ route('display.jobs') }} " style="margin-left: 20px;">Empleos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('display.apps') }}" style="margin-left: 20px;">Aplicaciones</a>
                    </li>
                </ul>
                @endauth
                <ul class="navbar-nav ml-md-auto d-md-flex">
                    @auth('admin')
                    <li class="nav-item px-6" style="margin-right: 50px ">
                        <a class="nav-link" href=" {{ route('admins.dashboard') }}">Inicio</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::guard('admin')->user()->email }}
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"  onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            {{ __('Cerrar Sesión') }}</a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @else
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('view.login') }}">Iniciar Sesion
                            <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
    <div class="container-fluid">
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</div>
</div>

<script type="text/javascript"> </script>
</body>
</html>
