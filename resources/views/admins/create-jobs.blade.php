@extends('layouts.admin')
@section('content')

<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-4 d-inline">Crear nuevo empleo</h5>

                <form class="p-4 p-md-5" action="{{ route('store.jobs') }}" method="post" enctype="multipart/form-data">
                    @csrf

                    @if( $errors -> has('titulo_trabajo'))
                        <p class="alert alert-secondary">{{ $errors->first('titulo_trabajo') }}</p>
                    @endif
                    <div class="form-group">
                        <label for="titulo_trabajo">Cargo</label>
                        <input type="text" name="titulo_trabajo" class="form-control" id="titulo_trabajo" placeholder="">
                    </div>

                    @if( $errors -> has('region_trabajo'))
                        <p class="alert alert-secondary">{{ $errors->first('region_trabajo') }}</p>
                    @endif
                    <div class="form-group">
                        <label for="region_trabajo">Region</label>
                        <select name="region_trabajo" class="form-select form-control" id="region_trabajo" data-style="btn-black" data-width="100%" data-live-search="true" title="Select Region">
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

                    @if( $errors -> has('empresa'))
                        <p class="alert alert-secondary">{{ $errors->first('empresa') }}</p>
                    @endif
                    <div class="form-group">
                        <label for="Empresa">Empresa</label>
                        <input type="text" name="empresa" class="form-control" id="empresa" placeholder="">
                    </div>

                    @if( $errors -> has('categoria'))
                        <p class="alert alert-secondary">{{ $errors->first('categoria') }}</p>
                    @endif
                    <div class="form-group">
                        <label for="categoria">Categoria</label>
                        <select name="categoria" class="selectpicker border rounded form-control " id="categoria" data-style="btn-black" data-width="100%" data-live-search="true" title="Selecciona categoria">
                            @foreach( $categories as $category)
                                <option value="{{ $category -> nombre }}">{{ $category -> nombre }}</option>
                            @endforeach
                        </select>
                    </div>

                    @if( $errors -> has('tipo_trabajo'))
                        <p class="alert alert-secondary">{{ $errors->first('tipo_trabajo') }}</p>
                    @endif
                    <div class="form-group">
                        <label for="tipo_trabajo">Tipo de Jornada</label>
                        <select name="tipo_trabajo" class="selectpicker border rounded form-control" id="tipo_trabajo" data-style="btn-black" data-width="100%" data-live-search="true" title="Selecciona la jornada">
                            <option value="Tiempo Completo"> Tiempo Completo </option>
                            <option value="Medio Tiempo"> Medio Tiempo </option>
                            <option value="Freelancer"> Freelancer </option>
                            <option value=" Por Horas"> Por Horas </option>
                        </select>
                    </div>

                    @if( $errors -> has('vacante'))
                        <p class="alert alert-secondary">{{ $errors->first('vacante') }}</p>
                    @endif
                    <div class="form-group">
                        <label for="Vacante">Vacante</label>
                        <input name="vacante" type="text" class="form-control" id="vacante" placeholder=" ">
                    </div>

                    @if( $errors -> has('experiencia'))
                        <p class="alert alert-secondary">{{ $errors->first('experiencia') }}</p>
                    @endif
                    <div class="form-group">
                        <label for="experiencia">Experiencia</label>
                        <select name="experiencia" class="selectpicker border rounded form-control" id="experiencia" data-style="btn-black" data-width="100%" data-live-search="true" title="Selecciona los años de experiencia">
                            <option>0-2 años</option>
                            <option>2-4 años</option>
                            <option>+4 años</option>
                        </select>
                    </div>

                    @if( $errors -> has('salario'))
                        <p class="alert alert-secondary">{{ $errors->first('salario') }}</p>
                    @endif
                    <div class="form-group">
                        <label for="salario">Salario</label>
                        <select name="salario" class="selectpicker border rounded form-control" id="salario" data-style="btn-black" data-width="100%" data-live-search="true" title="Selecciona el salario">
                            <option value="1M - 2M">1M - 2M</option>
                            <option value="2M - 3M">2M - 3M</option>
                            <option value="3M - 4M">3M - 4M</option>
                            <option value="4M - 5M">4M - 5M</option>
                            <option value="+5M">+5M</option>
                            <option value="A convenir">A convenir</option>
                        </select>
                    </div>

                    @if( $errors -> has('genero'))
                        <p class="alert alert-secondary">{{ $errors->first('genero') }}</p>
                    @endif
                    <div class="form-group">
                        <label for="job-type">Genero</label>
                        <select name="genero" class="selectpicker border rounded form-control " id="genero" data-style="btn-black" data-width="100%" data-live-search="true" title="Selecciona el genero">
                            <option value="Hombre">Hombre</option>
                            <option value="Mujer">Mujer</option>
                            <option value="Cualquiera">Cualquiera</option>
                        </select>
                    </div>

                    @if( $errors -> has('descripcion_trabajo'))
                        <p class="alert alert-secondary">{{ $errors->first('descripcion_trabajo') }}</p>
                    @endif
                    <div class="form-group">
                        <label for="descripcion_trabajo">Descripcion</label>
                        <input name="descripcion_trabajo" type="text" class="form-control" id="descripcion_trabajo" placeholder="">
                    </div>

                    @if( $errors -> has('responsabilidades'))
                        <p class="alert alert-secondary">{{ $errors->first('responsabilidades') }}</p>
                    @endif
                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="text-black" for="responsabilidades">Responsabilidades</label>
                            <textarea name="responsabilidades" id="responsabilidades    " cols="30" rows="7" class="form-control" placeholder=" "></textarea>
                        </div>
                    </div>

                    @if( $errors -> has('educacion_experiencia'))
                        <p class="alert alert-secondary">{{ $errors->first('educacion_experiencia') }}</p>
                    @endif
                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="text-black" for="educacion_experiencia">Educacion y Experiencia</label>
                            <textarea name="educacion_experiencia" id="" cols="30" rows="7" class="form-control" placeholder=" "></textarea>
                        </div>
                    </div>

                    @if( $errors -> has('otrosbeneficios'))
                        <p class="alert alert-secondary">{{ $errors->first('otrosbeneficios') }}</p>
                    @endif
                    <div class="row form-group">
                        <div class="col-md-12">
                            <label class="text-black" for="otrosbeneficios">Otros Beneficios</label>
                            <textarea name="otrosbeneficios" id="otrosbeneficios" cols="30" rows="7" class="form-control" placeholder=""></textarea>
                        </div>
                    </div>

                    @if( $errors -> has('imagen'))
                        <p class="alert alert-secondary">{{ $errors->first('imagen') }}</p>
                    @endif
                    <div class="form-group">
                        <label for="imagen">Imagen</label>
                        <input name="imagen" type="file" class="form-control">
                    </div>


                    <div class="col-lg-4 ml-auto">
                        <div class="row">
                            <div class="col-6">
                                <input type="submit" name="submit" class="btn btn-block btn-primary btn-md" style="margin-left: 200px;" value="Crear Empleo">
                            </div>
                        </div>
                    </div>


                </form>
            </div>
        </div>
    </div>
</div>

@endsection
