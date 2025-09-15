@extends('layouts.admin')

@section('title', 'Crear Empleo - Panel de Admin')
@section('page-title', 'Crear Empleo')

@section('breadcrumbs')
<li class="flex items-center">
    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
    </svg>
    Dashboard
</li>
<li class="flex items-center">
    <svg class="w-4 h-4 mx-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
    </svg>
    <a href="{{ route('display.jobs') }}" class="text-green-600 dark:text-green-400 hover:underline">
        Empleos
    </a>
</li>
<li class="flex items-center">
    <svg class="w-4 h-4 mx-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
    </svg>
    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
    </svg>
    Crear Empleo
</li>
@endsection

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    <!-- Header -->
    <div class="bg-gradient-to-r from-green-500 to-green-600 rounded-xl p-6 text-white">
        <div class="flex items-center">
            <div class="bg-white/20 rounded-lg p-3 mr-4">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2-2v2m8 0V6a2 2 0 012 2v6a2 2 0 01-2 2H6a2 2 0 01-2-2V8a2 2 0 012-2V6"></path>
                </svg>
            </div>
            <div>
                <h2 class="text-2xl font-bold mb-1">Crear Nueva Oferta de Empleo</h2>
                <p class="text-green-100">Publica una nueva oportunidad laboral</p>
            </div>
        </div>
    </div>

    <!-- Formulario -->
    <form action="{{ route('store.jobs') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf
        
        <!-- Información Básica -->
        <div class="card-modern">
            <div class="border-b border-gray-200 dark:border-gray-600 pb-4 mb-6">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white flex items-center">
                    <svg class="w-5 h-5 mr-2 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    Información Básica
                </h3>
                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                    Detalles fundamentales sobre la oferta de empleo
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Título del Trabajo -->
                <div class="lg:col-span-2">
                    <label for="titulo_trabajo" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2-2v2m8 0V6a2 2 0 012 2v6a2 2 0 01-2 2H6a2 2 0 01-2-2V8a2 2 0 012-2V6"></path>
                        </svg>
                        Título del Cargo *
                    </label>
                    <input 
                        type="text" 
                        name="titulo_trabajo" 
                        id="titulo_trabajo" 
                        class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent dark:bg-gray-700 dark:text-white transition-colors duration-200 @error('titulo_trabajo') border-red-500 ring-2 ring-red-200 @enderror" 
                        placeholder="Ej: Desarrollador Full Stack Senior"
                        value="{{ old('titulo_trabajo') }}"
                    />
                    @error('titulo_trabajo')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Empresa -->
                <div>
                    <label for="empresa" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                        </svg>
                        Empresa *
                    </label>
                    <input 
                        type="text" 
                        name="empresa" 
                        id="empresa" 
                        class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent dark:bg-gray-700 dark:text-white transition-colors duration-200 @error('empresa') border-red-500 ring-2 ring-red-200 @enderror" 
                        placeholder="Nombre de la empresa"
                        value="{{ old('empresa') }}"
                    />
                    @error('empresa')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Región -->
                <div>
                    <label for="region_trabajo" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                        </svg>
                        Región *
                    </label>
                    <select 
                        name="region_trabajo" 
                        id="region_trabajo" 
                        class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent dark:bg-gray-700 dark:text-white transition-colors duration-200 @error('region_trabajo') border-red-500 ring-2 ring-red-200 @enderror">
                        <option value="">Selecciona una región</option>
                        <option value="Amazonas" {{ old('region_trabajo') == 'Amazonas' ? 'selected' : '' }}>Amazonas</option>
                        <option value="Antioquia" {{ old('region_trabajo') == 'Antioquia' ? 'selected' : '' }}>Antioquia</option>
                        <option value="Arauca" {{ old('region_trabajo') == 'Arauca' ? 'selected' : '' }}>Arauca</option>
                        <option value="Atlántico" {{ old('region_trabajo') == 'Atlántico' ? 'selected' : '' }}>Atlántico</option>
                        <option value="Bolívar" {{ old('region_trabajo') == 'Bolívar' ? 'selected' : '' }}>Bolívar</option>
                        <option value="Boyacá" {{ old('region_trabajo') == 'Boyacá' ? 'selected' : '' }}>Boyacá</option>
                        <option value="Caquetá" {{ old('region_trabajo') == 'Caquetá' ? 'selected' : '' }}>Caquetá</option>
                        <option value="Casanare" {{ old('region_trabajo') == 'Casanare' ? 'selected' : '' }}>Casanare</option>
                        <option value="Cauca" {{ old('region_trabajo') == 'Cauca' ? 'selected' : '' }}>Cauca</option>
                        <option value="Cesar" {{ old('region_trabajo') == 'Cesar' ? 'selected' : '' }}>Cesar</option>
                        <option value="Chocó" {{ old('region_trabajo') == 'Chocó' ? 'selected' : '' }}>Chocó</option>
                        <option value="Córdoba" {{ old('region_trabajo') == 'Córdoba' ? 'selected' : '' }}>Córdoba</option>
                        <option value="Cundinamarca" {{ old('region_trabajo') == 'Cundinamarca' ? 'selected' : '' }}>Cundinamarca</option>
                        <option value="Guainía" {{ old('region_trabajo') == 'Guainía' ? 'selected' : '' }}>Guainía</option>
                        <option value="Guaviare" {{ old('region_trabajo') == 'Guaviare' ? 'selected' : '' }}>Guaviare</option>
                        <option value="Huila" {{ old('region_trabajo') == 'Huila' ? 'selected' : '' }}>Huila</option>
                        <option value="La Guajira" {{ old('region_trabajo') == 'La Guajira' ? 'selected' : '' }}>La Guajira</option>
                        <option value="Magdalena" {{ old('region_trabajo') == 'Magdalena' ? 'selected' : '' }}>Magdalena</option>
                        <option value="Meta" {{ old('region_trabajo') == 'Meta' ? 'selected' : '' }}>Meta</option>
                        <option value="Nariño" {{ old('region_trabajo') == 'Nariño' ? 'selected' : '' }}>Nariño</option>
                        <option value="Norte de Santander" {{ old('region_trabajo') == 'Norte de Santander' ? 'selected' : '' }}>Norte de Santander</option>
                        <option value="Putumayo" {{ old('region_trabajo') == 'Putumayo' ? 'selected' : '' }}>Putumayo</option>
                        <option value="Quindío" {{ old('region_trabajo') == 'Quindío' ? 'selected' : '' }}>Quindío</option>
                        <option value="Risaralda" {{ old('region_trabajo') == 'Risaralda' ? 'selected' : '' }}>Risaralda</option>
                        <option value="Santander" {{ old('region_trabajo') == 'Santander' ? 'selected' : '' }}>Santander</option>
                        <option value="Sucre" {{ old('region_trabajo') == 'Sucre' ? 'selected' : '' }}>Sucre</option>
                        <option value="Tolima" {{ old('region_trabajo') == 'Tolima' ? 'selected' : '' }}>Tolima</option>
                        <option value="Valle del Cauca" {{ old('region_trabajo') == 'Valle del Cauca' ? 'selected' : '' }}>Valle del Cauca</option>
                        <option value="Vaupés" {{ old('region_trabajo') == 'Vaupés' ? 'selected' : '' }}>Vaupés</option>
                        <option value="Vichada" {{ old('region_trabajo') == 'Vichada' ? 'selected' : '' }}>Vichada</option>
                    </select>
                    @error('region_trabajo')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Categoría -->
                <div>
                    <label for="categoria" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                        </svg>
                        Categoría *
                    </label>
                    <select 
                        name="categoria" 
                        id="categoria" 
                        class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent dark:bg-gray-700 dark:text-white transition-colors duration-200 @error('categoria') border-red-500 ring-2 ring-red-200 @enderror">
                        <option value="">Selecciona una categoría</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->nombre }}" {{ old('categoria') == $category->nombre ? 'selected' : '' }}>
                                {{ $category->nombre }}
                            </option>
                        @endforeach
                    </select>
                    @error('categoria')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Tipo de Trabajo -->
                <div>
                    <label for="tipo_trabajo" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Tipo de Jornada *
                    </label>
                    <select 
                        name="tipo_trabajo" 
                        id="tipo_trabajo" 
                        class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent dark:bg-gray-700 dark:text-white transition-colors duration-200 @error('tipo_trabajo') border-red-500 ring-2 ring-red-200 @enderror">
                        <option value="">Selecciona el tipo de jornada</option>
                        <option value="Tiempo Completo" {{ old('tipo_trabajo') == 'Tiempo Completo' ? 'selected' : '' }}>Tiempo Completo</option>
                        <option value="Medio Tiempo" {{ old('tipo_trabajo') == 'Medio Tiempo' ? 'selected' : '' }}>Medio Tiempo</option>
                        <option value="Freelancer" {{ old('tipo_trabajo') == 'Freelancer' ? 'selected' : '' }}>Freelancer</option>
                        <option value="Por Horas" {{ old('tipo_trabajo') == 'Por Horas' ? 'selected' : '' }}>Por Horas</option>
                    </select>
                    @error('tipo_trabajo')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Requisitos y Condiciones -->
        <div class="card-modern">
            <div class="border-b border-gray-200 dark:border-gray-600 pb-4 mb-6">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white flex items-center">
                    <svg class="w-5 h-5 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    Requisitos y Condiciones
                </h3>
                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                    Especifica los requisitos y condiciones laborales
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Vacantes -->
                <div>
                    <label for="vacante" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                        Vacantes *
                    </label>
                    <input 
                        type="number" 
                        name="vacante" 
                        id="vacante" 
                        min="1"
                        class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent dark:bg-gray-700 dark:text-white transition-colors duration-200 @error('vacante') border-red-500 ring-2 ring-red-200 @enderror" 
                        placeholder="1"
                        value="{{ old('vacante') }}"
                    />
                    @error('vacante')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Experiencia -->
                <div>
                    <label for="experiencia" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                        </svg>
                        Experiencia *
                    </label>
                    <select 
                        name="experiencia" 
                        id="experiencia" 
                        class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent dark:bg-gray-700 dark:text-white transition-colors duration-200 @error('experiencia') border-red-500 ring-2 ring-red-200 @enderror">
                        <option value="">Selecciona experiencia</option>
                        <option value="0-2 años" {{ old('experiencia') == '0-2 años' ? 'selected' : '' }}>0-2 años</option>
                        <option value="2-4 años" {{ old('experiencia') == '2-4 años' ? 'selected' : '' }}>2-4 años</option>
                        <option value="+4 años" {{ old('experiencia') == '+4 años' ? 'selected' : '' }}>+4 años</option>
                    </select>
                    @error('experiencia')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Salario -->
                <div>
                    <label for="salario" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                        </svg>
                        Salario *
                    </label>
                    <select 
                        name="salario" 
                        id="salario" 
                        class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent dark:bg-gray-700 dark:text-white transition-colors duration-200 @error('salario') border-red-500 ring-2 ring-red-200 @enderror">
                        <option value="">Selecciona rango salarial</option>
                        <option value="1M - 2M" {{ old('salario') == '1M - 2M' ? 'selected' : '' }}>1M - 2M</option>
                        <option value="2M - 3M" {{ old('salario') == '2M - 3M' ? 'selected' : '' }}>2M - 3M</option>
                        <option value="3M - 4M" {{ old('salario') == '3M - 4M' ? 'selected' : '' }}>3M - 4M</option>
                        <option value="4M - 5M" {{ old('salario') == '4M - 5M' ? 'selected' : '' }}>4M - 5M</option>
                        <option value="+5M" {{ old('salario') == '+5M' ? 'selected' : '' }}>+5M</option>
                        <option value="A convenir" {{ old('salario') == 'A convenir' ? 'selected' : '' }}>A convenir</option>
                    </select>
                    @error('salario')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Género -->
                <div>
                    <label for="genero" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                        Género *
                    </label>
                    <select 
                        name="genero" 
                        id="genero" 
                        class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent dark:bg-gray-700 dark:text-white transition-colors duration-200 @error('genero') border-red-500 ring-2 ring-red-200 @enderror">
                        <option value="">Selecciona género</option>
                        <option value="Hombre" {{ old('genero') == 'Hombre' ? 'selected' : '' }}>Hombre</option>
                        <option value="Mujer" {{ old('genero') == 'Mujer' ? 'selected' : '' }}>Mujer</option>
                        <option value="Cualquiera" {{ old('genero') == 'Cualquiera' ? 'selected' : '' }}>Cualquiera</option>
                    </select>
                    @error('genero')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>
            </div>
        </div>

        <!-- Descripción Detallada -->
        <div class="card-modern">
            <div class="border-b border-gray-200 dark:border-gray-600 pb-4 mb-6">
                <h3 class="text-lg font-semibold text-gray-900 dark:text-white flex items-center">
                    <svg class="w-5 h-5 mr-2 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    Descripción Detallada
                </h3>
                <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                    Proporciona información detallada sobre el puesto de trabajo
                </p>
            </div>

            <div class="space-y-6">
                <!-- Descripción del Trabajo -->
                <div>
                    <label for="descripcion_trabajo" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Descripción del Trabajo *
                    </label>
                    <textarea 
                        name="responsabilidades" 
                        id="descripcion_trabajo" 
                        rows="4" 
                        class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent dark:bg-gray-700 dark:text-white transition-colors duration-200 @error('descripcion_trabajo') border-red-500 ring-2 ring-red-200 @enderror" 
                        placeholder="Describe las funciones principales y el objetivo del puesto...">{{ old('responsabilidades') }}</textarea>
                    @error('descripcion_trabajo')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Responsabilidades -->
                <div>
                    <label for="responsabilidades" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Responsabilidades Principales *
                    </label>
                    <textarea 
                        name="responsabilidades" 
                        id="responsabilidades" 
                        rows="4" 
                        class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent dark:bg-gray-700 dark:text-white transition-colors duration-200 @error('responsabilidades') border-red-500 ring-2 ring-red-200 @enderror" 
                        placeholder="• Responsabilidad 1&#10;• Responsabilidad 2&#10;• Responsabilidad 3...">{{ old('responsabilidades') }}</textarea>
                    @error('responsabilidades')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Educación y Experiencia -->
                <div>
                    <label for="educacion_experiencia" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Educación y Experiencia Requerida *
                    </label>
                    <textarea 
                        name="educacion_experiencia" 
                        id="educacion_experiencia" 
                        rows="4" 
                        class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent dark:bg-gray-700 dark:text-white transition-colors duration-200 @error('educacion_experiencia') border-red-500 ring-2 ring-red-200 @enderror" 
                        placeholder="• Título universitario en...&#10;• Experiencia mínima de X años en...&#10;• Conocimientos en...">{{ old('educacion_experiencia') }}</textarea>
                    @error('educacion_experiencia')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Otros Beneficios -->
                <div>
                    <label for="otrosbeneficios" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        Beneficios Adicionales
                    </label>
                    <textarea 
                        name="otrosbeneficios" 
                        id="otrosbeneficios" 
                        rows="4" 
                        class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent dark:bg-gray-700 dark:text-white transition-colors duration-200 @error('otrosbeneficios') border-red-500 ring-2 ring-red-200 @enderror" 
                        placeholder="• Seguro médico&#10;• Bonificaciones&#10;• Teletrabajo...">{{ old('otrosbeneficios') }}</textarea>
                    @error('otrosbeneficios')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Imagen -->
                <div>
                    <label for="imagen" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                        <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        Imagen del Empleo
                    </label>
                    <input 
                        type="file" 
                        name="imagen" 
                        id="imagen" 
                        accept="image/*"
                        class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-transparent dark:bg-gray-700 dark:text-white transition-colors duration-200 @error('imagen') border-red-500 ring-2 ring-red-200 @enderror"
                    />
                    @error('imagen')
                        <p class="mt-2 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                    @enderror
                    <p class="text-xs text-gray-500 dark:text-gray-400 mt-1">
                        Formatos soportados: JPG, PNG, GIF. Tamaño máximo: 2MB.
                    </p>
                </div>
            </div>
        </div>

        <!-- Botones de acción -->
        <div class="flex items-center justify-between pt-4">
            <a href="{{ route('display.jobs') }}" 
               class="inline-flex items-center px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 transition-colors duration-200">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Cancelar
            </a>
            
            <button 
                type="submit" 
                name="submit" 
                class="inline-flex items-center px-8 py-3 bg-green-600 hover:bg-green-700 text-white text-sm font-medium rounded-lg transition-colors duration-200 shadow-sm hover:shadow-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2-2v2m8 0V6a2 2 0 012 2v6a2 2 0 01-2 2H6a2 2 0 01-2-2V8a2 2 0 012-2V6"></path>
                </svg>
                Crear Empleo
            </button>
        </div>
    </form>
</div>
@endsection
