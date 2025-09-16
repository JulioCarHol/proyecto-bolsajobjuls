@extends('layouts.app')

@section('content')

<!-- Hero Section -->
<section class="relative min-h-[40vh] bg-gradient-to-br from-purple-600 via-blue-600 to-indigo-700 overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-20">
        <div class="absolute inset-0" style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 50px 50px;"></div>
    </div>

    <!-- Floating Elements -->
    <div class="absolute top-20 left-20 w-16 h-16 bg-white bg-opacity-20 rounded-full animate-float"></div>
    <div class="absolute top-32 right-32 w-12 h-12 bg-purple-300 bg-opacity-30 rounded-full animate-bounce-slow"></div>
    <div class="absolute bottom-20 left-1/3 w-8 h-8 bg-blue-300 bg-opacity-25 rounded-full animate-float-delayed"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 py-20 sm:px-6 lg:px-8">
        <div class="text-center">
            <!-- Breadcrumb -->
            <nav class="mb-8" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="{{ route('home') }}" class="text-blue-100 hover:text-white transition-colors duration-200">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/>
                            </svg>
                            Inicio
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-blue-200" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-blue-100 ml-1 md:ml-2">Trabajos Guardados</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <!-- Title -->
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-6">
                Empleos 
                <span class="bg-gradient-to-r from-yellow-400 to-orange-500 bg-clip-text text-transparent">Guardados</span>
            </h1>
            <p class="text-xl text-blue-100 max-w-2xl mx-auto">
                Gestiona y revisa todos los trabajos que has guardado para aplicar más tarde
            </p>
        </div>
    </div>
</section>

<!-- Main Content -->
<section class="py-16 bg-gray-50 dark:bg-gray-900 min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- Stats Section -->
        <div class="mb-12">
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-8">
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-900 dark:text-white mb-2">
                            Mis Trabajos Guardados
                        </h2>
                        <p class="text-gray-600 dark:text-gray-300">
                            Tienes {{ $jobsaved->count() }} {{ $jobsaved->count() === 1 ? 'trabajo guardado' : 'trabajos guardados' }}
                        </p>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="text-right">
                            <div class="text-3xl font-bold text-purple-600 dark:text-purple-400">{{ $jobsaved->count() }}</div>
                            <div class="text-sm text-gray-500 dark:text-gray-400">Total</div>
                        </div>
                        <div class="w-16 h-16 bg-purple-100 dark:bg-purple-900 rounded-full flex items-center justify-center">
                            <svg class="w-8 h-8 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Jobs List -->
        <div class="space-y-6" x-data="{ viewMode: 'list' }">
            <!-- View Toggle -->
            <div class="flex justify-between items-center mb-8">
                <div>
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Lista de Empleos</h3>
                    <p class="text-gray-600 dark:text-gray-300">Revisa y gestiona tus trabajos guardados</p>
                </div>
                <div class="flex items-center space-x-2 bg-white dark:bg-gray-800 rounded-lg p-1 shadow-sm">
                    <button @click="viewMode = 'list'" 
                            :class="viewMode === 'list' ? 'bg-blue-600 text-white' : 'text-gray-600 dark:text-gray-300'"
                            class="px-3 py-2 rounded-md transition-all duration-200 flex items-center">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"/>
                        </svg>
                        Lista
                    </button>
                    <button @click="viewMode = 'grid'" 
                            :class="viewMode === 'grid' ? 'bg-blue-600 text-white' : 'text-gray-600 dark:text-gray-300'"
                            class="px-3 py-2 rounded-md transition-all duration-200 flex items-center">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                        </svg>
                        Grid
                    </button>
                </div>
            </div>

            @if($jobsaved->count() > 0)
                <!-- List View -->
                <div x-show="viewMode === 'list'" x-transition class="space-y-4">
                    @foreach($jobsaved as $job)
                    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden group border border-gray-200 dark:border-gray-700">
                        <div class="p-6">
                            <div class="flex items-center space-x-6">
                                <!-- Company Logo -->
                                <div class="flex-shrink-0">
                                    <div class="w-16 h-16 bg-gray-100 dark:bg-gray-700 rounded-xl overflow-hidden group-hover:scale-105 transition-transform duration-300">
                                        <img src="{{ asset('assets/images/'.$job->imagen) }}" 
                                             alt="{{ $job->empresa }}" 
                                             class="w-full h-full object-cover">
                                    </div>
                                </div>

                                <!-- Job Info -->
                                <div class="flex-1 min-w-0">
                                    <div class="flex items-start justify-between">
                                        <div class="flex-1">
                                            <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2 group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors">
                                                {{ $job->titulo_trabajo }}
                                            </h3>
                                            <p class="text-lg text-gray-700 dark:text-gray-300 font-semibold mb-3">
                                                {{ $job->empresa }}
                                            </p>
                                            <div class="flex items-center space-x-4 text-sm text-gray-600 dark:text-gray-400">
                                                <div class="flex items-center">
                                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                    </svg>
                                                    {{ $job->region_trabajo }}
                                                </div>
                                                <div class="flex items-center">
                                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                                    </svg>
                                                    {{ $job->tipo_trabajo }}
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Actions -->
                                        <div class="flex items-center space-x-3 ml-4">
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium
                                                @if($job->tipo_trabajo === 'Tiempo Completo') bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200
                                                @elseif($job->tipo_trabajo === 'Medio Tiempo') bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200
                                                @elseif($job->tipo_trabajo === 'Freelance') bg-purple-100 text-purple-800 dark:bg-purple-900 dark:text-purple-200
                                                @else bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-200 @endif">
                                                {{ $job->tipo_trabajo }}
                                            </span>
                                            <a href="{{ route('single.job', $job->job_id) }}" 
                                               class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-200 group">
                                                Ver Detalles
                                                <svg class="w-4 h-4 ml-2 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Grid View -->
                <div x-show="viewMode === 'grid'" x-transition class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($jobsaved as $job)
                    <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-md hover:shadow-xl transition-all duration-300 overflow-hidden group border border-gray-200 dark:border-gray-700">
                        <!-- Company Logo -->
                        <div class="p-6 pb-4">
                            <div class="w-16 h-16 bg-gray-100 dark:bg-gray-700 rounded-xl overflow-hidden mx-auto group-hover:scale-105 transition-transform duration-300">
                                <img src="{{ asset('assets/images/'.$job->imagen) }}" 
                                     alt="{{ $job->empresa }}" 
                                     class="w-full h-full object-cover">
                            </div>
                        </div>

                        <!-- Job Info -->
                        <div class="px-6 pb-6">
                            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2 text-center group-hover:text-blue-600 dark:group-hover:text-blue-400 transition-colors">
                                {{ $job->titulo_trabajo }}
                            </h3>
                            <p class="text-gray-700 dark:text-gray-300 font-semibold mb-4 text-center">
                                {{ $job->empresa }}
                            </p>
                            
                            <div class="space-y-3 mb-6">
                                <div class="flex items-center justify-center text-sm text-gray-600 dark:text-gray-400">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                    {{ $job->region_trabajo }}
                                </div>
                                <div class="flex justify-center">
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium
                                        @if($job->tipo_trabajo === 'Tiempo Completo') bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200
                                        @elseif($job->tipo_trabajo === 'Medio Tiempo') bg-blue-100 text-blue-800 dark:bg-blue-900 dark:text-blue-200
                                        @elseif($job->tipo_trabajo === 'Freelance') bg-purple-100 text-purple-800 dark:bg-purple-900 dark:text-purple-200
                                        @else bg-gray-100 text-gray-800 dark:bg-gray-900 dark:text-gray-200 @endif">
                                        {{ $job->tipo_trabajo }}
                                    </span>
                                </div>
                            </div>

                            <a href="{{ route('single.job', $job->job_id) }}" 
                               class="w-full inline-flex items-center justify-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors duration-200 group">
                                Ver Detalles
                                <svg class="w-4 h-4 ml-2 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>

            @else
                <!-- Empty State -->
                <div class="text-center py-16">
                    <div class="bg-white dark:bg-gray-800 rounded-3xl shadow-lg p-12 max-w-md mx-auto">
                        <div class="w-24 h-24 bg-gray-100 dark:bg-gray-700 rounded-full flex items-center justify-center mx-auto mb-6">
                            <svg class="w-12 h-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 5a2 2 0 012-2h10a2 2 0 012 2v16l-7-3.5L5 21V5z"/>
                            </svg>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-4">
                            No hay empleos guardados
                        </h3>
                        <p class="text-gray-600 dark:text-gray-300 mb-8">
                            Aún no has guardado ningún trabajo. Explora nuestras ofertas y guarda los que te interesen.
                        </p>
                        <a href="{{ route('home') }}" 
                           class="inline-flex items-center px-6 py-3 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition-colors duration-200 group">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                            Explorar Empleos
                            <svg class="w-4 h-4 ml-2 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </a>
                    </div>
                </div>
            @endif
        </div>
    </div>
</section>

@endsection
