@extends('layouts.app')

@section('content')
    <!-- Hero Section with Search -->
    <section class="relative bg-gradient-to-br from-primary-600 via-primary-700 to-primary-800 text-white overflow-hidden"
             x-data="{ 
                 searchQuery: '', 
                 selectedRegion: '', 
                 selectedType: '',
                 showAdvancedFilters: false 
             }">
        
        <!-- Background pattern -->
        <div class="absolute inset-0 bg-grid-pattern opacity-10"></div>
        <div class="absolute inset-0 bg-gradient-to-r from-primary-600/20 to-transparent"></div>
        
        <!-- Floating elements -->
        <div class="absolute top-20 right-20 w-32 h-32 bg-white/10 rounded-full blur-xl"></div>
        <div class="absolute bottom-20 left-20 w-24 h-24 bg-secondary-500/20 rounded-full blur-lg"></div>
        
        <div class="relative container mx-auto px-4 sm:px-6 lg:px-8 py-20">
            <div class="text-center mb-12">
                <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold mb-6 leading-tight">
                    Encuentra tu
                    <span class="bg-gradient-to-r from-yellow-300 to-orange-300 bg-clip-text text-transparent">
                        empleo ideal
                    </span>
                </h1>
                <p class="text-xl md:text-2xl text-primary-100 mb-8 max-w-3xl mx-auto leading-relaxed">
                    Conectamos el mejor talento con las mejores oportunidades. 
                    Descubre {{ $totalJobs }} ofertas activas esperándote.
                </p>
                
                <!-- Trust indicators -->
                <div class="flex flex-wrap justify-center gap-8 text-sm text-primary-200 mb-12">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-green-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Verificado y seguro
                    </div>
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-green-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                        Aplicación rápida
                    </div>
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-green-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        Actualizaciones diarias
                    </div>
                </div>
            </div>

            <!-- Modern Search Form -->
            <div class="max-w-6xl mx-auto">
                <form method="post" action="{{ route('search.job') }}" 
                      class="bg-white/10 backdrop-blur-lg rounded-2xl p-8 border border-white/20 shadow-2xl">
                    @csrf
                    
                    <!-- Main Search Grid -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
                        <!-- Job Title -->
                        <div class="relative">
                            <label class="block text-sm font-medium text-white/90 mb-2">
                                <svg class="inline w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                                ¿Qué trabajo buscas?
                            </label>
                            <input name="titulo_trabajo" 
                                   type="text" 
                                   x-model="searchQuery"
                                   placeholder="Ej: Desarrollador, Marketing, Ventas..."
                                   class="w-full px-4 py-3 bg-white/20 backdrop-blur-sm border border-white/30 rounded-lg text-white placeholder:text-white/60 focus:outline-none focus:ring-2 focus:ring-white/50 focus:border-white/50 transition-all">
                        </div>

                        <!-- Region -->
                        <div class="relative">
                            <label class="block text-sm font-medium text-white/90 mb-2">
                                <svg class="inline w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                                Ubicación
                            </label>
                            <select name="region_trabajo" 
                                    x-model="selectedRegion"
                                    class="w-full px-4 py-3 bg-white/20 backdrop-blur-sm border border-white/30 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-white/50 focus:border-white/50 transition-all">
                                <option value="" class="text-gray-800">Seleccionar departamento</option>
                                <option value="Amazonas" class="text-gray-800">Amazonas</option>
                                <option value="Antioquia" class="text-gray-800">Antioquia</option>
                                <option value="Arauca" class="text-gray-800">Arauca</option>
                                <option value="Atlántico" class="text-gray-800">Atlántico</option>
                                <option value="Bolívar" class="text-gray-800">Bolívar</option>
                                <option value="Boyacá" class="text-gray-800">Boyacá</option>
                                <option value="Caquetá" class="text-gray-800">Caquetá</option>
                                <option value="Casanare" class="text-gray-800">Casanare</option>
                                <option value="Cauca" class="text-gray-800">Cauca</option>
                                <option value="Cesar" class="text-gray-800">Cesar</option>
                                <option value="Chocó" class="text-gray-800">Chocó</option>
                                <option value="Córdoba" class="text-gray-800">Córdoba</option>
                                <option value="Cundinamarca" class="text-gray-800">Cundinamarca</option>
                                <option value="Guainía" class="text-gray-800">Guainía</option>
                                <option value="Guaviare" class="text-gray-800">Guaviare</option>
                                <option value="Huila" class="text-gray-800">Huila</option>
                                <option value="La Guajira" class="text-gray-800">La Guajira</option>
                                <option value="Magdalena" class="text-gray-800">Magdalena</option>
                                <option value="Meta" class="text-gray-800">Meta</option>
                                <option value="Nariño" class="text-gray-800">Nariño</option>
                                <option value="Norte de Santander" class="text-gray-800">Norte de Santander</option>
                                <option value="Putumayo" class="text-gray-800">Putumayo</option>
                                <option value="Quindío" class="text-gray-800">Quindío</option>
                                <option value="Risaralda" class="text-gray-800">Risaralda</option>
                                <option value="Santander" class="text-gray-800">Santander</option>
                                <option value="Sucre" class="text-gray-800">Sucre</option>
                                <option value="Tolima" class="text-gray-800">Tolima</option>
                                <option value="Valle del Cauca" class="text-gray-800">Valle del Cauca</option>
                                <option value="Vaupés" class="text-gray-800">Vaupés</option>
                                <option value="Vichada" class="text-gray-800">Vichada</option>
                            </select>
                        </div>

                        <!-- Job Type -->
                        <div class="relative">
                            <label class="block text-sm font-medium text-white/90 mb-2">
                                <svg class="inline w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                Tipo de jornada
                            </label>
                            <select name="tipo_trabajo" 
                                    x-model="selectedType"
                                    class="w-full px-4 py-3 bg-white/20 backdrop-blur-sm border border-white/30 rounded-lg text-white focus:outline-none focus:ring-2 focus:ring-white/50 focus:border-white/50 transition-all">
                                <option value="" class="text-gray-800">Cualquier jornada</option>
                                <option value="Tiempo Completo" class="text-gray-800">Tiempo Completo</option>
                                <option value="Medio Tiempo" class="text-gray-800">Medio Tiempo</option>
                                <option value="Freelancer" class="text-gray-800">Freelancer</option>
                                <option value="Por Horas" class="text-gray-800">Por Horas</option>
                            </select>
                        </div>

                        <!-- Search Button -->
                        <div class="relative">
                            <label class="block text-sm font-medium text-transparent mb-2">Search</label>
                            <button name="submit" 
                                    type="submit" 
                                    class="w-full h-12 bg-gradient-to-r from-yellow-400 to-orange-500 hover:from-yellow-500 hover:to-orange-600 text-gray-900 font-semibold rounded-lg transition-all duration-200 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-yellow-400 focus:ring-offset-2 focus:ring-offset-primary-600 shadow-lg">
                                <svg class="inline w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                                Buscar empleos
                            </button>
                        </div>
                    </div>

                    <!-- Popular Keywords -->
                    <div class="border-t border-white/20 pt-6">
                        <h3 class="text-lg font-semibold text-white mb-4 flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                            Búsquedas populares:
                        </h3>
                        <div class="flex flex-wrap gap-2">
                            @foreach($duplicates as $duplicate)
                                <a href="#" 
                                   class="inline-flex items-center px-4 py-2 bg-white/10 hover:bg-white/20 text-white text-sm rounded-full border border-white/20 hover:border-white/40 transition-all duration-200 backdrop-blur-sm">
                                    {{ $duplicate->keyword }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Scroll Indicator -->
        <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
            <a href="#stats" class="block p-2 text-white/60 hover:text-white transition-colors">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                </svg>
            </a>
        </div>
    </section>

    <!-- Statistics Section -->
    <section id="stats" class="py-20 bg-white dark:bg-gray-800" 
             x-data="{ 
                 animateStats: false, 
                 candidates: 0, 
                 totalJobs: 0, 
                 completedJobs: 0, 
                 companies: 0 
             }"
             x-init="
                 const observer = new IntersectionObserver((entries) => {
                     entries.forEach(entry => {
                         if (entry.isIntersecting && !animateStats) {
                             animateStats = true;
                             animateNumber('candidates', 20, 2000);
                             animateNumber('totalJobs', {{ $totalJobs }}, 2200);
                             animateNumber('completedJobs', 120, 2400);
                             animateNumber('companies', 20, 2600);
                         }
                     });
                 });
                 observer.observe($el);
                 
                 function animateNumber(property, target, duration) {
                     let start = 0;
                     const increment = target / (duration / 16);
                     const timer = setInterval(() => {
                         start += increment;
                         this[property] = Math.floor(start);
                         if (start >= target) {
                             this[property] = target;
                             clearInterval(timer);
                         }
                     }, 16);
                 }
             ">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="text-center mb-16">
                <div class="inline-flex items-center px-4 py-2 bg-primary-100 dark:bg-primary-900/20 text-primary-800 dark:text-primary-300 text-sm font-medium rounded-full mb-6">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                    </svg>
                    Resultados comprobados
                </div>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4">
                    Cifras que respaldan nuestro éxito
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-300 max-w-3xl mx-auto">
                    Con un alto número de empleos postulados, demostramos ser una plataforma atractiva para candidatos en busca de 
                    oportunidades profesionales, conectando empresas con talento calificado para contrataciones exitosas.
                </p>
            </div>

            <!-- Stats Grid -->
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Stat 1 -->
                <div class="text-center group" x-show="animateStats" x-transition.duration.500ms>
                    <div class="relative mb-6">
                        <div class="w-20 h-20 bg-gradient-to-br from-blue-500 to-blue-600 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                        <div class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-white mb-2" x-text="candidates.toLocaleString()">0</div>
                        <div class="text-gray-600 dark:text-gray-400 font-medium">Candidatos registrados</div>
                    </div>
                </div>

                <!-- Stat 2 -->
                <div class="text-center group" x-show="animateStats" x-transition.duration.500ms>
                    <div class="relative mb-6">
                        <div class="w-20 h-20 bg-gradient-to-br from-green-500 to-green-600 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 13.255A23.931 23.931 0 0112 15c-3.183 0-6.22-.62-9-1.745M16 6V4a2 2 0 00-2-2h-4a2 2 0 00-2-2v2m8 0V4.5a2 2 0 00-2-2h-4a2 2 0 00-2 2V6m8 0V7a2 2 0 01-2 2H8a2 2 0 01-2-2V6m8 0H8"></path>
                            </svg>
                        </div>
                        <div class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-white mb-2" x-text="totalJobs.toLocaleString()">0</div>
                        <div class="text-gray-600 dark:text-gray-400 font-medium">Ofertas de empleo</div>
                    </div>
                </div>

                <!-- Stat 3 -->
                <div class="text-center group" x-show="animateStats" x-transition.duration.500ms>
                    <div class="relative mb-6">
                        <div class="w-20 h-20 bg-gradient-to-br from-purple-500 to-purple-600 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-white mb-2" x-text="completedJobs.toLocaleString()">0</div>
                        <div class="text-gray-600 dark:text-gray-400 font-medium">Empleos exitosos</div>
                    </div>
                </div>

                <!-- Stat 4 -->
                <div class="text-center group" x-show="animateStats" x-transition.duration.500ms>
                    <div class="relative mb-6">
                        <div class="w-20 h-20 bg-gradient-to-br from-orange-500 to-orange-600 rounded-2xl flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform duration-300 shadow-lg">
                            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                        </div>
                        <div class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-white mb-2" x-text="companies.toLocaleString()">0</div>
                        <div class="text-gray-600 dark:text-gray-400 font-medium">Empresas activas</div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <!-- Jobs Listing Section -->
    <section class="py-20 bg-gray-50 dark:bg-gray-900" x-data="{ viewMode: 'grid' }">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-12">
                <div>
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4">
                        {{ $totalJobs }} Ofertas Disponibles
                    </h2>
                    <p class="text-lg text-gray-600 dark:text-gray-300">
                        Descubre oportunidades que se ajusten a tu perfil profesional
                    </p>
                </div>
                
                <!-- View Toggle -->
                <div class="flex items-center space-x-2 mt-4 md:mt-0">
                    <span class="text-sm text-gray-600 dark:text-gray-400">Vista:</span>
                    <div class="bg-white dark:bg-gray-800 rounded-lg p-1 border border-gray-200 dark:border-gray-700">
                        <button @click="viewMode = 'grid'" 
                                :class="viewMode === 'grid' ? 'bg-primary-100 dark:bg-primary-900/20 text-primary-600 dark:text-primary-400' : 'text-gray-500 dark:text-gray-400'"
                                class="p-2 rounded transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"></path>
                            </svg>
                        </button>
                        <button @click="viewMode = 'list'" 
                                :class="viewMode === 'list' ? 'bg-primary-100 dark:bg-primary-900/20 text-primary-600 dark:text-primary-400' : 'text-gray-500 dark:text-gray-400'"
                                class="p-2 rounded transition-colors">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Jobs Grid View -->
            <div x-show="viewMode === 'grid'" 
                 class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($jobs as $job)
                    <div class="group bg-white dark:bg-gray-800 rounded-2xl border border-gray-200 dark:border-gray-700 overflow-hidden hover:shadow-xl hover:border-primary-300 dark:hover:border-primary-600 transition-all duration-300 transform hover:-translate-y-1">
                        <a href="{{ route('single.job', $job->id) }}" class="block">
                            <!-- Company Logo -->
                            <div class="p-6 pb-4">
                                <div class="flex items-start justify-between mb-4">
                                    <div class="w-16 h-16 bg-gray-100 dark:bg-gray-700 rounded-xl overflow-hidden flex-shrink-0">
                                        <img src="{{ asset('assets/images/'.$job->imagen) }}" 
                                             alt="{{ $job->empresa }}" 
                                             class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                                    </div>
                                    <div class="flex items-center space-x-1">
                                        <svg class="w-4 h-4 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                        </svg>
                                        <span class="text-sm text-gray-500 dark:text-gray-400">4.8</span>
                                    </div>
                                </div>
                                
                                <!-- Job Title & Company -->
                                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2 group-hover:text-primary-600 dark:group-hover:text-primary-400 transition-colors">
                                    {{ $job->titulo_trabajo }}
                                </h3>
                                <p class="text-lg font-medium text-gray-600 dark:text-gray-300 mb-4">
                                    {{ $job->empresa }}
                                </p>
                                
                                <!-- Location & Job Type -->
                                <div class="flex items-center justify-between mb-4">
                                    <div class="flex items-center text-gray-500 dark:text-gray-400">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                        <span class="text-sm">{{ $job->region_trabajo }}</span>
                                    </div>
                                    
                                    @php
                                        $badgeColors = [
                                            'Tiempo Completo' => 'bg-green-100 text-green-800 dark:bg-green-900/20 dark:text-green-400',
                                            'Medio Tiempo' => 'bg-blue-100 text-blue-800 dark:bg-blue-900/20 dark:text-blue-400',
                                            'Freelancer' => 'bg-purple-100 text-purple-800 dark:bg-purple-900/20 dark:text-purple-400',
                                            'Por Horas' => 'bg-orange-100 text-orange-800 dark:bg-orange-900/20 dark:text-orange-400'
                                        ];
                                        $colorClass = $badgeColors[$job->tipo_trabajo] ?? 'bg-gray-100 text-gray-800 dark:bg-gray-900/20 dark:text-gray-400';
                                    @endphp
                                    
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium {{ $colorClass }}">
                                        {{ $job->tipo_trabajo }}
                                    </span>
                                </div>
                                
                                <!-- Apply Button -->
                                <div class="mt-6">
                                    <button class="w-full bg-primary-600 hover:bg-primary-700 text-white font-semibold py-3 px-6 rounded-lg transition-colors duration-200 flex items-center justify-center group-hover:shadow-lg">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                        </svg>
                                        Ver detalles
                                    </button>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>

            <!-- Jobs List View -->
            <div x-show="viewMode === 'list'" 
                 class="space-y-4">
                @foreach($jobs as $job)
                    <div class="group bg-white dark:bg-gray-800 rounded-xl border border-gray-200 dark:border-gray-700 overflow-hidden hover:shadow-lg hover:border-primary-300 dark:hover:border-primary-600 transition-all duration-300">
                        <a href="{{ route('single.job', $job->id) }}" class="block">
                            <div class="p-6">
                                <div class="flex items-center justify-between">
                                    <!-- Left: Logo + Info -->
                                    <div class="flex items-center space-x-4 flex-1">
                                        <div class="w-16 h-16 bg-gray-100 dark:bg-gray-700 rounded-xl overflow-hidden flex-shrink-0">
                                            <img src="{{ asset('assets/images/'.$job->imagen) }}" 
                                                 alt="{{ $job->empresa }}" 
                                                 class="w-full h-full object-cover">
                                        </div>
                                        
                                        <div class="flex-1">
                                            <h3 class="text-xl font-bold text-gray-900 dark:text-white group-hover:text-primary-600 dark:group-hover:text-primary-400 transition-colors">
                                                {{ $job->titulo_trabajo }}
                                            </h3>
                                            <p class="text-lg font-medium text-gray-600 dark:text-gray-300 mb-2">
                                                {{ $job->empresa }}
                                            </p>
                                            <div class="flex items-center space-x-4 text-sm text-gray-500 dark:text-gray-400">
                                                <div class="flex items-center">
                                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                    </svg>
                                                    {{ $job->region_trabajo }}
                                                </div>
                                                <div class="flex items-center">
                                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                    </svg>
                                                    {{ $job->tipo_trabajo }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <!-- Right: Action Button -->
                                    <div class="flex items-center space-x-4">
                                        @php
                                            $badgeColors = [
                                                'Tiempo Completo' => 'bg-green-100 text-green-800 dark:bg-green-900/20 dark:text-green-400',
                                                'Medio Tiempo' => 'bg-blue-100 text-blue-800 dark:bg-blue-900/20 dark:text-blue-400',
                                                'Freelancer' => 'bg-purple-100 text-purple-800 dark:bg-purple-900/20 dark:text-purple-400',
                                                'Por Horas' => 'bg-orange-100 text-orange-800 dark:bg-orange-900/20 dark:text-orange-400'
                                            ];
                                            $colorClass = $badgeColors[$job->tipo_trabajo] ?? 'bg-gray-100 text-gray-800 dark:bg-gray-900/20 dark:text-gray-400';
                                        @endphp
                                        
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium {{ $colorClass }}">
                                            {{ $job->tipo_trabajo }}
                                        </span>
                                        
                                        <button class="bg-primary-600 hover:bg-primary-700 text-white font-semibold py-2 px-6 rounded-lg transition-colors duration-200 flex items-center">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                            </svg>
                                            Ver más
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 bg-gradient-to-r from-primary-600 to-primary-800 text-white relative overflow-hidden">
        <!-- Background elements -->
        <div class="absolute inset-0 bg-gradient-to-r from-primary-600/20 to-transparent"></div>
        <div class="absolute top-10 right-10 w-32 h-32 bg-white/10 rounded-full blur-xl"></div>
        <div class="absolute bottom-10 left-10 w-24 h-24 bg-secondary-500/20 rounded-full blur-lg"></div>
        
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative">
            <div class="flex flex-col lg:flex-row items-center justify-between">
                <div class="lg:w-2/3 mb-8 lg:mb-0">
                    <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-4">
                        ¿Buscas trabajo?
                    </h2>
                    <p class="text-xl text-primary-100 leading-relaxed">
                        Únete a nuestra comunidad y descubre oportunidades que se ajusten perfectamente a tu perfil profesional. 
                        Miles de empresas confían en nosotros para encontrar el mejor talento.
                    </p>
                </div>
                <div class="lg:w-1/3 lg:pl-12">
                    <a href="{{ route('register') }}" 
                       class="inline-flex items-center px-8 py-4 bg-white hover:bg-gray-50 text-primary-600 text-lg font-semibold rounded-xl shadow-xl hover:shadow-2xl transition-all duration-200 transform hover:scale-105 w-full justify-center lg:w-auto">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"></path>
                        </svg>
                        Registrarse gratis
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Companies Section -->
    <section class="py-20 bg-white dark:bg-gray-800">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <div class="inline-flex items-center px-4 py-2 bg-primary-100 dark:bg-primary-900/20 text-primary-800 dark:text-primary-300 text-sm font-medium rounded-full mb-6">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                    Empresas destacadas
                </div>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4">
                    Empresas que confían en nosotros
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-300 max-w-3xl mx-auto">
                    Descubre algunas empresas destacadas que han encontrado talento excepcional a través de nuestra plataforma
                </p>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-8 gap-8 items-center">
                <div class="flex justify-center p-4 bg-gray-50 dark:bg-gray-700 rounded-xl hover:bg-gray-100 dark:hover:bg-gray-600 transition-colors group">
                    <img src="{{ asset('assets/images/logo_mailchimp.svg') }}" 
                         alt="Mailchimp" 
                         class="h-8 w-auto filter grayscale group-hover:grayscale-0 transition-all duration-300 opacity-60 group-hover:opacity-100">
                </div>
                <div class="flex justify-center p-4 bg-gray-50 dark:bg-gray-700 rounded-xl hover:bg-gray-100 dark:hover:bg-gray-600 transition-colors group">
                    <img src="{{ asset('assets/images/logo_paypal.svg') }}" 
                         alt="PayPal" 
                         class="h-8 w-auto filter grayscale group-hover:grayscale-0 transition-all duration-300 opacity-60 group-hover:opacity-100">
                </div>
                <div class="flex justify-center p-4 bg-gray-50 dark:bg-gray-700 rounded-xl hover:bg-gray-100 dark:hover:bg-gray-600 transition-colors group">
                    <img src="{{ asset('assets/images/logo_stripe.svg') }}" 
                         alt="Stripe" 
                         class="h-8 w-auto filter grayscale group-hover:grayscale-0 transition-all duration-300 opacity-60 group-hover:opacity-100">
                </div>
                <div class="flex justify-center p-4 bg-gray-50 dark:bg-gray-700 rounded-xl hover:bg-gray-100 dark:hover:bg-gray-600 transition-colors group">
                    <img src="{{ asset('assets/images/logo_visa.svg') }}" 
                         alt="Visa" 
                         class="h-8 w-auto filter grayscale group-hover:grayscale-0 transition-all duration-300 opacity-60 group-hover:opacity-100">
                </div>
                <div class="flex justify-center p-4 bg-gray-50 dark:bg-gray-700 rounded-xl hover:bg-gray-100 dark:hover:bg-gray-600 transition-colors group">
                    <img src="{{ asset('assets/images/logo_apple.svg') }}" 
                         alt="Apple" 
                         class="h-8 w-auto filter grayscale group-hover:grayscale-0 transition-all duration-300 opacity-60 group-hover:opacity-100">
                </div>
                <div class="flex justify-center p-4 bg-gray-50 dark:bg-gray-700 rounded-xl hover:bg-gray-100 dark:hover:bg-gray-600 transition-colors group">
                    <img src="{{ asset('assets/images/logo_tinder.svg') }}" 
                         alt="Tinder" 
                         class="h-8 w-auto filter grayscale group-hover:grayscale-0 transition-all duration-300 opacity-60 group-hover:opacity-100">
                </div>
                <div class="flex justify-center p-4 bg-gray-50 dark:bg-gray-700 rounded-xl hover:bg-gray-100 dark:hover:bg-gray-600 transition-colors group">
                    <img src="{{ asset('assets/images/logo_sony.svg') }}" 
                         alt="Sony" 
                         class="h-8 w-auto filter grayscale group-hover:grayscale-0 transition-all duration-300 opacity-60 group-hover:opacity-100">
                </div>
                <div class="flex justify-center p-4 bg-gray-50 dark:bg-gray-700 rounded-xl hover:bg-gray-100 dark:hover:bg-gray-600 transition-colors group">
                    <img src="{{ asset('assets/images/logo_airbnb.svg') }}" 
                         alt="Airbnb" 
                         class="h-8 w-auto filter grayscale group-hover:grayscale-0 transition-all duration-300 opacity-60 group-hover:opacity-100">
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials Section -->
    <section class="py-20 bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-900 dark:to-gray-800">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <div class="inline-flex items-center px-4 py-2 bg-primary-100 dark:bg-primary-900/20 text-primary-800 dark:text-primary-300 text-sm font-medium rounded-full mb-6">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                    </svg>
                    Testimonios
                </div>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4">
                    Lo que dicen nuestros usuarios
                </h2>
                <p class="text-xl text-gray-600 dark:text-gray-300 max-w-3xl mx-auto">
                    Historias reales de profesionales que han encontrado su trabajo ideal a través de nuestra plataforma
                </p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Testimonial 1 -->
                <div class="bg-white dark:bg-gray-800 rounded-2xl p-8 border border-gray-200 dark:border-gray-700 shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <div class="flex items-start justify-between mb-6">
                        <div class="flex">
                            @for($i = 0; $i < 5; $i++)
                                <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                </svg>
                            @endfor
                        </div>
                        <svg class="w-8 h-8 text-primary-600 dark:text-primary-400" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h4v10h-10z"/>
                        </svg>
                    </div>
                    <blockquote class="text-lg text-gray-700 dark:text-gray-300 mb-6 leading-relaxed">
                        "Encontré mi trabajo ideal en menos de dos semanas. La plataforma es muy intuitiva y las ofertas son de excelente calidad. Sin duda la recomiendo a todos los profesionales que buscan nuevas oportunidades."
                    </blockquote>
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-primary-100 dark:bg-primary-900/20 rounded-full overflow-hidden">
                            <img src="{{ asset('assets/images/person_transparent.png') }}" 
                                 alt="Corey Woods" 
                                 class="w-full h-full object-cover">
                        </div>
                        <div class="ml-4">
                            <p class="font-semibold text-gray-900 dark:text-white">Corey Woods</p>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Desarrollador Frontend</p>
                        </div>
                    </div>
                </div>

                <!-- Testimonial 2 -->
                <div class="bg-white dark:bg-gray-800 rounded-2xl p-8 border border-gray-200 dark:border-gray-700 shadow-lg hover:shadow-xl transition-shadow duration-300">
                    <div class="flex items-start justify-between mb-6">
                        <div class="flex">
                            @for($i = 0; $i < 5; $i++)
                                <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                                </svg>
                            @endfor
                        </div>
                        <svg class="w-8 h-8 text-primary-600 dark:text-primary-400" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h4v10h-10z"/>
                        </svg>
                    </div>
                    <blockquote class="text-lg text-gray-700 dark:text-gray-300 mb-6 leading-relaxed">
                        "Como reclutadora, he encontrado candidatos excepcionales a través de esta plataforma. La calidad de los perfiles es impresionante y el proceso de selección es muy eficiente."
                    </blockquote>
                    <div class="flex items-center">
                        <div class="w-12 h-12 bg-primary-100 dark:bg-primary-900/20 rounded-full overflow-hidden">
                            <img src="{{ asset('assets/images/person_transparent.png') }}" 
                                 alt="Chris Peters" 
                                 class="w-full h-full object-cover">
                        </div>
                        <div class="ml-4">
                            <p class="font-semibold text-gray-900 dark:text-white">Chris Peters</p>
                            <p class="text-sm text-gray-500 dark:text-gray-400">Gerente de RRHH</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Mobile App Section -->
    <section class="py-20 bg-gradient-to-r from-primary-600 to-primary-800 text-white relative overflow-hidden">
        <!-- Background elements -->
        <div class="absolute inset-0 opacity-20">
            <div class="absolute top-20 left-20 w-40 h-40 bg-white rounded-full blur-3xl"></div>
            <div class="absolute bottom-20 right-20 w-32 h-32 bg-secondary-400 rounded-full blur-2xl"></div>
        </div>
        
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 relative">
            <div class="text-center">
                <div class="inline-flex items-center px-4 py-2 bg-white/20 backdrop-blur-sm text-white text-sm font-medium rounded-full mb-8">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                    </svg>
                    Disponible en móviles
                </div>
                
                <h2 class="text-3xl md:text-4xl lg:text-5xl font-bold mb-6">
                    Lleva tu búsqueda de empleo<br class="hidden md:block">
                    <span class="bg-gradient-to-r from-yellow-300 to-orange-300 bg-clip-text text-transparent">
                        en tu bolsillo
                    </span>
                </h2>
                
                <p class="text-xl text-primary-100 mb-12 max-w-3xl mx-auto leading-relaxed">
                    Descarga nuestra app móvil y mantente conectado con las mejores oportunidades laborales. 
                    Recibe notificaciones instantáneas de nuevas ofertas que coincidan con tu perfil.
                </p>
                
                <div class="flex flex-col sm:flex-row justify-center gap-4">
                    <a href="#" 
                       class="inline-flex items-center px-8 py-4 bg-black hover:bg-gray-900 text-white font-semibold rounded-xl transition-all duration-200 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-primary-600 shadow-xl">
                        <svg class="w-6 h-6 mr-3" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M18.71 19.5c-.83 1.24-1.71 2.45-3.05 2.47-1.34.03-1.77-.79-3.29-.79-1.53 0-2 .77-3.27.82-1.31.05-2.3-1.32-3.14-2.53C4.25 17 2.94 12.45 4.7 9.39c.87-1.52 2.43-2.48 4.12-2.51 1.28-.02 2.5.87 3.29.87.78 0 2.26-1.07 3.81-.91.65.03 2.47.26 3.64 1.98-.09.06-2.17 1.28-2.15 3.81.03 3.02 2.65 4.03 2.68 4.04-.03.07-.42 1.44-1.38 2.83M13 3.5c.73-.83 1.94-1.46 2.94-1.5.13 1.17-.34 2.35-1.04 3.19-.69.85-1.83 1.51-2.95 1.42-.15-1.15.41-2.35 1.05-3.11z"/>
                        </svg>
                        App Store
                    </a>
                    <a href="#" 
                       class="inline-flex items-center px-8 py-4 bg-black hover:bg-gray-900 text-white font-semibold rounded-xl transition-all duration-200 transform hover:scale-105 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-primary-600 shadow-xl">
                        <svg class="w-6 h-6 mr-3" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M3,20.5V3.5C3,2.91 3.34,2.39 3.84,2.15L13.69,12L3.84,21.85C3.34,21.6 3,21.09 3,20.5M16.81,15.12L6.05,21.34L14.54,12.85L16.81,15.12M20.16,10.81C20.5,11.08 20.75,11.5 20.75,12C20.75,12.5 20.53,12.9 20.18,13.18L17.89,14.5L15.39,12L17.89,9.5L20.16,10.81M6.05,2.66L16.81,8.88L14.54,11.15L6.05,2.66Z"/>
                        </svg>
                        Google Play
                    </a>
                </div>
            </div>
        </div>
    </section>

@endsection
