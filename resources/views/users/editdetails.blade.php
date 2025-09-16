@extends('layouts.app')

@section('content')

<!-- Hero Section -->
<section class="relative min-h-[40vh] bg-gradient-to-br from-emerald-600 via-blue-600 to-purple-700 overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-20">
        <div class="absolute inset-0" style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 50px 50px;"></div>
    </div>

    <!-- Floating Elements -->
    <div class="absolute top-16 left-16 w-20 h-20 bg-white bg-opacity-20 rounded-full animate-float"></div>
    <div class="absolute top-32 right-24 w-16 h-16 bg-emerald-300 bg-opacity-30 rounded-full animate-bounce-slow"></div>
    <div class="absolute bottom-20 left-1/4 w-12 h-12 bg-blue-300 bg-opacity-25 rounded-full animate-float-delayed"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 py-20 sm:px-6 lg:px-8">
        <div class="text-center">
            <!-- Breadcrumb -->
            <nav class="mb-8" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="{{ route('home') }}" class="text-emerald-100 hover:text-white transition-colors duration-200">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/>
                            </svg>
                            Inicio
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-emerald-200" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                            </svg>
                            <a href="{{ route('profile') }}" class="text-emerald-100 hover:text-white transition-colors duration-200 ml-1 md:ml-2">Mi Perfil</a>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-emerald-200" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-emerald-100 ml-1 md:ml-2">Editar Detalles</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <!-- Title -->
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-6">
                Actualizar 
                <span class="bg-gradient-to-r from-emerald-400 to-blue-500 bg-clip-text text-transparent">Datos</span>
            </h1>
            <p class="text-xl text-emerald-100 max-w-2xl mx-auto">
                Mantén tu perfil actualizado para mejores oportunidades laborales
            </p>
        </div>
    </div>
</section>

<!-- Main Content -->
<section class="py-16 bg-gray-50 dark:bg-gray-900 min-h-screen">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Success Message -->
        @if(\Session::has('update'))
            <div x-data="{ show: true }" x-show="show" x-transition class="mb-8">
                <div class="bg-green-50 dark:bg-green-900 border-l-4 border-green-400 p-4 rounded-r-lg shadow-lg">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                            </svg>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-green-700 dark:text-green-100">{!! \Session::get('update') !!}</p>
                        </div>
                        <div class="ml-auto pl-3">
                            <button @click="show = false" class="text-green-400 hover:text-green-600 transition-colors">
                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <!-- Form Container -->
        <div class="bg-white dark:bg-gray-800 rounded-3xl shadow-2xl overflow-hidden">
            <!-- Header -->
            <div class="bg-gradient-to-r from-emerald-600 to-blue-600 px-8 py-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="w-12 h-12 bg-white bg-opacity-20 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="ml-4">
                        <h2 class="text-2xl font-bold text-white">Actualizar Datos</h2>
                        <p class="text-emerald-100">Completa tu información personal y profesional</p>
                    </div>
                </div>
            </div>

            <!-- Form -->
            <form class="p-8" action="{{ route('update.details') }}" method="post" x-data="editDetailsForm()">
                @csrf

                <!-- Personal Information Section -->
                <div class="mb-12">
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-6 flex items-center">
                        <svg class="w-5 h-5 mr-3 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                        Información Personal
                    </h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Name -->
                        <div class="space-y-2">
                            <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Nombre Completo *
                            </label>
                            @if($errors->has('name'))
                                <p class="text-red-600 dark:text-red-400 text-sm">{{ $errors->first('name') }}</p>
                            @endif
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                </div>
                                <input type="text" 
                                       name="name" 
                                       id="name"
                                       value="{{ old('name', $userDetails->name) }}"
                                       x-model="form.name"
                                       @input="validateField('name')"
                                       class="block w-full pl-10 pr-3 py-3 border border-gray-300 dark:border-gray-600 rounded-xl shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 dark:bg-gray-700 dark:text-white transition-all duration-200"
                                       placeholder="Ingresa tu nombre completo">
                            </div>
                        </div>

                        <!-- Job Title -->
                        <div class="space-y-2">
                            <label for="titulo_trabajo" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Área de Trabajo *
                            </label>
                            @if($errors->has('titulo_trabajo'))
                                <p class="text-red-600 dark:text-red-400 text-sm">{{ $errors->first('titulo_trabajo') }}</p>
                            @endif
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2-2v2m8 0V6a2 2 0 012 2v6a2 2 0 01-2 2H6a2 2 0 01-2-2V8a2 2 0 012-2V6"/>
                                    </svg>
                                </div>
                                <input type="text" 
                                       name="titulo_trabajo" 
                                       id="titulo_trabajo"
                                       value="{{ old('titulo_trabajo', $userDetails->titulo_trabajo) }}"
                                       x-model="form.titulo_trabajo"
                                       @input="validateField('titulo_trabajo')"
                                       class="block w-full pl-10 pr-3 py-3 border border-gray-300 dark:border-gray-600 rounded-xl shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 dark:bg-gray-700 dark:text-white transition-all duration-200"
                                       placeholder="Ej: Desarrollador Full Stack">
                            </div>
                        </div>
                    </div>

                    <!-- Bio -->
                    <div class="mt-6 space-y-2">
                        <label for="bio" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                            Descripción del Perfil *
                        </label>
                        @if($errors->has('bio'))
                            <p class="text-red-600 dark:text-red-400 text-sm">{{ $errors->first('bio') }}</p>
                        @endif
                        <div class="relative">
                            <textarea name="bio" 
                                      id="bio" 
                                      rows="5"
                                      x-model="form.bio"
                                      @input="validateField('bio')"
                                      class="block w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-xl shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 dark:bg-gray-700 dark:text-white transition-all duration-200 resize-none"
                                      placeholder="Describe tu experiencia profesional, habilidades y objetivos profesionales...">{{ old('bio', $userDetails->bio) }}</textarea>
                            <div class="absolute bottom-3 right-3 text-xs text-gray-400" x-text="form.bio.length + '/500'"></div>
                        </div>
                        <p class="text-sm text-gray-500 dark:text-gray-400">
                            Comparte tu experiencia, habilidades y lo que te hace único como profesional.
                        </p>
                    </div>
                </div>

                <!-- Social Media Section -->
                <div class="mb-12">
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-6 flex items-center">
                        <svg class="w-5 h-5 mr-3 text-emerald-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.367 2.684 3 3 0 00-5.367-2.684z"/>
                        </svg>
                        Redes Sociales
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-6">
                        Conecta tus perfiles profesionales para que los empleadores puedan conocerte mejor.
                    </p>

                    <div class="space-y-6">
                        <!-- Facebook -->
                        <div class="space-y-2">
                            <label for="facebook" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Facebook
                            </label>
                            @if($errors->has('facebook'))
                                <p class="text-red-600 dark:text-red-400 text-sm">{{ $errors->first('facebook') }}</p>
                            @endif
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                                    </svg>
                                </div>
                                <input type="url" 
                                       name="facebook" 
                                       id="facebook"
                                       value="{{ old('facebook', $userDetails->facebook) }}"
                                       class="block w-full pl-10 pr-3 py-3 border border-gray-300 dark:border-gray-600 rounded-xl shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white transition-all duration-200"
                                       placeholder="https://facebook.com/tu-perfil">
                            </div>
                        </div>

                        <!-- Twitter -->
                        <div class="space-y-2">
                            <label for="twitter" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Twitter / X
                            </label>
                            @if($errors->has('twitter'))
                                <p class="text-red-600 dark:text-red-400 text-sm">{{ $errors->first('twitter') }}</p>
                            @endif
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-sky-500" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                                    </svg>
                                </div>
                                <input type="url" 
                                       name="twitter" 
                                       id="twitter"
                                       value="{{ old('twitter', $userDetails->twitter) }}"
                                       class="block w-full pl-10 pr-3 py-3 border border-gray-300 dark:border-gray-600 rounded-xl shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-sky-500 focus:border-sky-500 dark:bg-gray-700 dark:text-white transition-all duration-200"
                                       placeholder="https://twitter.com/tu-usuario">
                            </div>
                        </div>

                        <!-- LinkedIn -->
                        <div class="space-y-2">
                            <label for="linkedin" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                LinkedIn
                            </label>
                            @if($errors->has('linkedin'))
                                <p class="text-red-600 dark:text-red-400 text-sm">{{ $errors->first('linkedin') }}</p>
                            @endif
                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <svg class="h-5 w-5 text-blue-700" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                                    </svg>
                                </div>
                                <input type="url" 
                                       name="linkedin" 
                                       id="linkedin"
                                       value="{{ old('linkedin', $userDetails->linkedin) }}"
                                       class="block w-full pl-10 pr-3 py-3 border border-gray-300 dark:border-gray-600 rounded-xl shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-700 focus:border-blue-700 dark:bg-gray-700 dark:text-white transition-all duration-200"
                                       placeholder="https://linkedin.com/in/tu-perfil">
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="flex items-center justify-between pt-8 border-t border-gray-200 dark:border-gray-700">
                    <a href="{{ route('profile') }}" 
                       class="inline-flex items-center px-6 py-3 border border-gray-300 dark:border-gray-600 shadow-sm text-base font-medium rounded-xl text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500 transition-all duration-200">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        Cancelar
                    </a>
                    
                    <button type="submit" 
                            x-bind:disabled="!isFormValid"
                            x-bind:class="isFormValid ? 'bg-emerald-600 hover:bg-emerald-700 focus:ring-emerald-500 cursor-pointer' : 'bg-gray-400 cursor-not-allowed'"
                            class="inline-flex items-center px-8 py-3 border border-transparent text-base font-medium rounded-xl text-white shadow-lg focus:outline-none focus:ring-2 focus:ring-offset-2 transition-all duration-200 transform hover:scale-105">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        Guardar Cambios
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

<script>
function editDetailsForm() {
    return {
        form: {
            name: '{{ old('name', $userDetails->name) }}',
            titulo_trabajo: '{{ old('titulo_trabajo', $userDetails->titulo_trabajo) }}',
            bio: '{{ old('bio', $userDetails->bio) }}'
        },
        
        get isFormValid() {
            return this.form.name.trim().length > 0 && 
                   this.form.titulo_trabajo.trim().length > 0 && 
                   this.form.bio.trim().length > 0;
        },
        
        validateField(field) {
            // Adicional validaciones si es necesario
        }
    }
}
</script>

@endsection
