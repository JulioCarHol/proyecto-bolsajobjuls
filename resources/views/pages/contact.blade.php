@extends('layouts.app')

@section('content')



    <section class="section-hero overlay inner-page bg-image" style="background-image: url({{ asset('assets/images/hero_1.jpg') }});" id="home-section">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1 class="text-white font-weight-bold">Contáctanos</h1>
                <div class="custom-breadcrumbs">
                    <a href="{{ route('home') }}">Inicio</a> <span class="mx-2 slash">/</span>
                    <span class="text-white"><strong>Contáctanos</strong></span>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="site-section" id="next-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mb-5 mb-lg-0">
                <form action="#" class="">

                    <div class="row form-group">
                        <div class="col-md-6 mb-3 mb-md-0">
                            <label class="text-black" for="fname">Nombre</label>
                            <input type="text" id="fname" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label class="text-black" for="lname">Apellido</label>
                            <input type="text" id="lname" class="form-control">
                        </div>
                    </div>

                    <div class="row form-group">

                        <div class="col-md-12">
                            <label class="text-black" for="email">Correo Electrónico</label>
                            <input type="email" id="email" class="form-control">
                        </div>
                    </div>

                    <div class="row form-group">

                        <div class="col-md-12">
                            <label class="text-black" for="subject">Titulo</label>
                            <input type="subject" id="subject" class="form-control">
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="text-black" for="message">Mensaje</label>
                            <textarea name="message" id="message" cols="30" rows="7" class="form-control" placeholder="Escribe el motivo de este mensaje"></textarea>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12">
                            <input type="submit" value="Enviar Mensaje" class="btn btn-primary btn-md text-white">
                        </div>
                    </div>


                </form>
            </div>
            <div class="col-lg-5 ml-auto">
                <div class="p-4 mb-3 bg-white">
                    <p class="mb-0 font-weight-bold">Dirección</p>
                    <p class="mb-4">Bogotá D.C, Colombia</p>

                    <p class="mb-0 font-weight-bold">Celular</p>
                    <p class="mb-4"><a href="#">+57 123456789</a></p>

                    <p class="mb-0 font-weight-bold">Correo Electrónico</p>
                    <p class="mb-0"><a href="#">JulioC@jobjuls.com</a></p>

                </div>
            </div>
        </div>
    </div>
</section>

<section class="site-section bg-light">
    <div class="container">
        <div class="row mb-5">
            <div class="col-12 text-center" data-aos="fade">
                <h2 class="section-title mb-3">Opiniones</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="block__87154 bg-white rounded">
                    <blockquote>
                        <p>&ldquo;Ipsum harum assumenda in eum vel eveniet numquam cumque vero vitae enim cupiditate deserunt eligendi officia modi consectetur. Expedita tempora quos nobis earum hic ex asperiores quisquam optio nostrum sit&rdquo;</p>
                    </blockquote>
                    <div class="block__91147 d-flex align-items-center">
                        <figure class="mr-4"><img src="{{ asset('assets/images/person_2.jpg') }}" alt="Image" class="img-fluid"></figure>
                        <div>
                            <h3>Julio Cardenas</h3>
                            <span class="position">Desarrollador</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="block__87154 bg-white rounded">
                    <blockquote>
                        <p>&ldquo;Ipsum harum assumenda in eum vel eveniet numquam, cumque vero vitae enim cupiditate deserunt eligendi officia modi consectetur. Expedita tempora quos nobis earum hic ex asperiores quisquam optio nostrum sit&rdquo;</p>
                    </blockquote>
                    <div class="block__91147 d-flex align-items-center">
                        <figure class="mr-4"><img src="{{ asset('assets/images/person_2.jpg') }}" alt="Image" class="img-fluid"></figure>
                        <div>
                            <h3>Julio Cardenas</h3>
                            <span class="position">Desarrollador</span>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
</section>

@endsection
