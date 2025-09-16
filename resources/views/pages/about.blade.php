@extends('layouts.app')
@section('content')

    <!-- Hero Section -->
    <section class="relative bg-gradient-to-br from-primary-600 via-primary-700 to-primary-800 text-white overflow-hidden">
        <!-- Background pattern -->
        <div class="absolute inset-0 bg-grid-pattern opacity-10"></div>
        <div class="absolute inset-0 bg-gradient-to-r from-primary-600/20 to-transparent"></div>
        
        <!-- Floating elements -->
        <div class="absolute top-20 right-20 w-32 h-32 bg-white/10 rounded-full blur-xl"></div>
        <div class="absolute bottom-20 left-20 w-24 h-24 bg-secondary-500/20 rounded-full blur-lg"></div>
        
        <div class="relative container mx-auto px-4 sm:px-6 lg:px-8 py-20">
            <div class="max-w-4xl">
                <!-- Breadcrumbs -->
                <nav class="flex items-center space-x-2 text-primary-200 mb-8">
                    <a href="{{ route('home') }}" class="hover:text-white transition-colors">
                        <svg class="w-4 h-4 mr-1 inline" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                        </svg>
                        Inicio
                    </a>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                    </svg>
                    <span class="text-white font-medium">Acerca de</span>
                </nav>
                
                <!-- Page Title -->
                <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6 leading-tight">
                    Conoce nuestra
                    <span class="bg-gradient-to-r from-yellow-300 to-orange-300 bg-clip-text text-transparent">
                        historia
                    </span>
                </h1>
                <p class="text-xl md:text-2xl text-primary-100 leading-relaxed max-w-3xl">
                    Conectamos talento excepcional con oportunidades únicas, construyendo puentes hacia el futuro profesional.
                </p>
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
                 jobs: 0, 
                 successful: 0, 
                 companies: 0 
             }"
             x-init="
                 const observer = new IntersectionObserver((entries) => {
                     entries.forEach(entry => {
                         if (entry.isIntersecting && !animateStats) {
                             animateStats = true;
                             animateNumber('candidates', 20, 2000);
                             animateNumber('jobs', 20, 2200);
                             animateNumber('successful', 120, 2400);
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
                    Impacto comprobado
                </div>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4">
                    Números que nos respaldan
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
                        <div class="text-gray-600 dark:text-gray-400 font-medium">Candidatos</div>
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
                        <div class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-white mb-2" x-text="jobs.toLocaleString()">0</div>
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
                        <div class="text-4xl md:text-5xl font-bold text-gray-900 dark:text-white mb-2" x-text="successful.toLocaleString()">0</div>
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


    <!-- Company Story Section -->
    <section class="py-20 bg-gray-50 dark:bg-gray-900">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <!-- Content -->
                <div class="order-2 lg:order-1" x-data="{ show: false }" x-intersect="show = true">
                    <div x-show="show" x-transition.duration.800ms>
                        <div class="inline-flex items-center px-4 py-2 bg-primary-100 dark:bg-primary-900/20 text-primary-800 dark:text-primary-300 text-sm font-medium rounded-full mb-6">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                            </svg>
                            Nuestra historia
                        </div>
                        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-6">
                            Transformando el futuro del trabajo
                        </h2>
                        <div class="space-y-6 text-gray-600 dark:text-gray-300">
                            <p class="text-lg leading-relaxed">
                                Desde nuestros inicios, hemos creído en el poder de conectar el talento adecuado con las oportunidades perfectas. 
                                Lo que comenzó como una idea simple se ha convertido en una plataforma robusta que transforma vidas profesionales.
                            </p>
                            <p class="text-lg leading-relaxed">
                                Nuestra misión es simple pero poderosa: democratizar el acceso al empleo de calidad. Creemos que cada persona 
                                merece encontrar un trabajo que no solo pague las cuentas, sino que también inspire y desafíe.
                            </p>
                            <p class="text-lg leading-relaxed">
                                A través de tecnología innovadora y un enfoque centrado en el usuario, hemos construido más que una plataforma 
                                de empleos: hemos creado un ecosistema donde el talento florece y las empresas prosperan.
                            </p>
                        </div>
                        
                        <!-- Key Features -->
                        <div class="mt-8 space-y-4">
                            <div class="flex items-start space-x-3">
                                <div class="flex-shrink-0 w-6 h-6 bg-green-100 dark:bg-green-900/20 rounded-full flex items-center justify-center mt-1">
                                    <svg class="w-4 h-4 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900 dark:text-white">Tecnología Avanzada</h4>
                                    <p class="text-gray-600 dark:text-gray-300">Algoritmos inteligentes que conectan perfiles perfectos</p>
                                </div>
                            </div>
                            <div class="flex items-start space-x-3">
                                <div class="flex-shrink-0 w-6 h-6 bg-green-100 dark:bg-green-900/20 rounded-full flex items-center justify-center mt-1">
                                    <svg class="w-4 h-4 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900 dark:text-white">Experiencia Personalizada</h4>
                                    <p class="text-gray-600 dark:text-gray-300">Cada usuario recibe recomendaciones adaptadas a su perfil</p>
                                </div>
                            </div>
                            <div class="flex items-start space-x-3">
                                <div class="flex-shrink-0 w-6 h-6 bg-green-100 dark:bg-green-900/20 rounded-full flex items-center justify-center mt-1">
                                    <svg class="w-4 h-4 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900 dark:text-white">Soporte Continuo</h4>
                                    <p class="text-gray-600 dark:text-gray-300">Acompañamos cada paso del proceso de búsqueda y contratación</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Image -->
                <div class="order-1 lg:order-2" x-data="{ show: false }" x-intersect="show = true">
                    <div x-show="show" x-transition.duration.1000ms class="relative">
                        <div class="aspect-w-4 aspect-h-3 rounded-2xl overflow-hidden shadow-2xl">
                            <img src="{{ asset('assets/images/hero_1.jpg') }}" 
                                 alt="Nuestro equipo" 
                                 class="w-full h-full object-cover">
                            <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent"></div>
                        </div>
                        
                        <!-- Floating Stats Card -->
                        <div class="absolute -bottom-6 -left-6 bg-white dark:bg-gray-800 rounded-xl shadow-lg p-6 border border-gray-100 dark:border-gray-700">
                            <div class="flex items-center space-x-4">
                                <div class="w-12 h-12 bg-primary-100 dark:bg-primary-900/20 rounded-lg flex items-center justify-center">
                                    <svg class="w-6 h-6 text-primary-600 dark:text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                                    </svg>
                                </div>
                                <div>
                                    <div class="text-2xl font-bold text-gray-900 dark:text-white">98%</div>
                                    <div class="text-sm text-gray-600 dark:text-gray-400">Tasa de éxito</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Platform Features Section -->
    <section class="py-20 bg-white dark:bg-gray-800">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center mb-20">
                <!-- Content -->
                <div x-data="{ show: false }" x-intersect="show = true">
                    <div x-show="show" x-transition.duration.800ms>
                        <div class="inline-flex items-center px-4 py-2 bg-blue-100 dark:bg-blue-900/20 text-blue-800 dark:text-blue-300 text-sm font-medium rounded-full mb-6">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                            Para candidatos
                        </div>
                        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-6">
                            Tu carrera profesional comienza aquí
                        </h2>
                        <p class="text-lg text-gray-600 dark:text-gray-300 leading-relaxed mb-8">
                            Descubre oportunidades laborales que se adapten a tu perfil profesional. Nuestra plataforma te conecta 
                            con empresas que valoran tu talento y experiencia, facilitando tu crecimiento profesional.
                        </p>
                        
                        <!-- Benefits List -->
                        <div class="space-y-4">
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 bg-blue-100 dark:bg-blue-900/20 rounded-lg flex items-center justify-center">
                                    <svg class="w-5 h-5 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                </div>
                                <span class="text-gray-900 dark:text-white font-medium">Búsqueda inteligente de empleos</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 bg-blue-100 dark:bg-blue-900/20 rounded-lg flex items-center justify-center">
                                    <svg class="w-5 h-5 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                </div>
                                <span class="text-gray-900 dark:text-white font-medium">Perfil profesional optimizado</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 bg-blue-100 dark:bg-blue-900/20 rounded-lg flex items-center justify-center">
                                    <svg class="w-5 h-5 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-5 5v-5zM9 5l5-5v5H9z"></path>
                                    </svg>
                                </div>
                                <span class="text-gray-900 dark:text-white font-medium">Aplicaciones rápidas y sencillas</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Image -->
                <div x-data="{ show: false }" x-intersect="show = true">
                    <div x-show="show" x-transition.duration.1000ms class="relative">
                        <div class="aspect-w-4 aspect-h-3 rounded-2xl overflow-hidden shadow-xl">
                            <img src="{{ asset('assets/images/sq_img_6.jpg') }}" 
                                 alt="Para candidatos" 
                                 class="w-full h-full object-cover">
                        </div>
                    </div>
                </div>
            </div>

            <!-- For Employers Section -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
                <!-- Image -->
                <div class="order-2 lg:order-1" x-data="{ show: false }" x-intersect="show = true">
                    <div x-show="show" x-transition.duration.1000ms class="relative">
                        <div class="aspect-w-4 aspect-h-3 rounded-2xl overflow-hidden shadow-xl">
                            <img src="{{ asset('assets/images/sq_img_8.jpg') }}" 
                                 alt="Para empleadores" 
                                 class="w-full h-full object-cover">
                        </div>
                    </div>
                </div>
                
                <!-- Content -->
                <div class="order-1 lg:order-2" x-data="{ show: false }" x-intersect="show = true">
                    <div x-show="show" x-transition.duration.800ms>
                        <div class="inline-flex items-center px-4 py-2 bg-green-100 dark:bg-green-900/20 text-green-800 dark:text-green-300 text-sm font-medium rounded-full mb-6">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                            Para empleadores
                        </div>
                        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-6">
                            Encuentra el talento que necesitas
                        </h2>
                        <p class="text-lg text-gray-600 dark:text-gray-300 leading-relaxed mb-8">
                            Conecta con candidatos calificados y construye equipos excepcionales. Nuestra plataforma te ayuda 
                            a encontrar el talento perfecto para hacer crecer tu empresa.
                        </p>
                        
                        <!-- Benefits List -->
                        <div class="space-y-4">
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 bg-green-100 dark:bg-green-900/20 rounded-lg flex items-center justify-center">
                                    <svg class="w-5 h-5 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                    </svg>
                                </div>
                                <span class="text-gray-900 dark:text-white font-medium">Base de datos de candidatos verificados</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 bg-green-100 dark:bg-green-900/20 rounded-lg flex items-center justify-center">
                                    <svg class="w-5 h-5 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                    </svg>
                                </div>
                                <span class="text-gray-900 dark:text-white font-medium">Herramientas de gestión de candidatos</span>
                            </div>
                            <div class="flex items-center space-x-3">
                                <div class="w-8 h-8 bg-green-100 dark:bg-green-900/20 rounded-lg flex items-center justify-center">
                                    <svg class="w-5 h-5 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                                    </svg>
                                </div>
                                <span class="text-gray-900 dark:text-white font-medium">Publicación de ofertas optimizada</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Team Section -->
    <section class="py-20 bg-gray-50 dark:bg-gray-900">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="text-center mb-16" x-data="{ show: false }" x-intersect="show = true">
                <div x-show="show" x-transition.duration.600ms>
                    <div class="inline-flex items-center px-4 py-2 bg-primary-100 dark:bg-primary-900/20 text-primary-800 dark:text-primary-300 text-sm font-medium rounded-full mb-6">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                        Nuestro equipo
                    </div>
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 dark:text-white mb-4">
                        Las personas detrás de la innovación
                    </h2>
                    <p class="text-xl text-gray-600 dark:text-gray-300 max-w-3xl mx-auto">
                        Un equipo apasionado de profesionales dedicados a transformar la manera en que las personas encuentran trabajo 
                        y las empresas contratan talento.
                    </p>
                </div>
            </div>

            <!-- Team Grid -->
            <div class="space-y-16">
                <!-- Team Member 1 -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center" x-data="{ show: false }" x-intersect="show = true">
                    <!-- Image -->
                    <div x-show="show" x-transition.duration.800ms>
                        <div class="relative">
                            <div class="aspect-w-4 aspect-h-5 rounded-2xl overflow-hidden shadow-xl">
                                <img src="{{ asset('assets/images/person_5.jpg') }}" 
                                     alt="Julio Cardenas" 
                                     class="w-full h-full object-cover">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>
                            </div>
                            
                            <!-- Floating Badge -->
                            <div class="absolute -bottom-4 -right-4 bg-white dark:bg-gray-800 rounded-xl shadow-lg p-4 border border-gray-100 dark:border-gray-700">
                                <div class="flex items-center space-x-3">
                                    <div class="w-8 h-8 bg-primary-100 dark:bg-primary-900/20 rounded-lg flex items-center justify-center">
                                        <svg class="w-5 h-5 text-primary-600 dark:text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 20l4-16m4 4l4 4-4 4M6 16l-4-4 4-4"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="text-sm font-semibold text-gray-900 dark:text-white">5+ Años</div>
                                        <div class="text-xs text-gray-600 dark:text-gray-400">Experiencia</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Content -->
                    <div x-show="show" x-transition.duration.1000ms>
                        <div class="space-y-6">
                            <div>
                                <h3 class="text-2xl md:text-3xl font-bold text-gray-900 dark:text-white mb-2">
                                    Julio Cardenas
                                </h3>
                                <p class="text-lg text-primary-600 dark:text-primary-400 font-medium mb-6">
                                    Desarrollador Full Stack & Fundador
                                </p>
                            </div>
                            
                            <div class="prose prose-lg text-gray-600 dark:text-gray-300">
                                <p>
                                    Julio es el visionario detrás de JobJuls, con más de 5 años de experiencia en desarrollo web y 
                                    una pasión por crear soluciones tecnológicas que impacten positivamente en las vidas de las personas.
                                </p>
                                <p>
                                    Su enfoque en la experiencia de usuario y la innovación tecnológica ha sido fundamental para 
                                    construir una plataforma que realmente conecta talento con oportunidades de manera efectiva.
                                </p>
                            </div>
                            
                            <!-- Skills -->
                            <div class="flex flex-wrap gap-2 mb-6">
                                <span class="px-3 py-1 bg-blue-100 dark:bg-blue-900/20 text-blue-800 dark:text-blue-300 text-sm font-medium rounded-full">Laravel</span>
                                <span class="px-3 py-1 bg-green-100 dark:bg-green-900/20 text-green-800 dark:text-green-300 text-sm font-medium rounded-full">Vue.js</span>
                                <span class="px-3 py-1 bg-purple-100 dark:bg-purple-900/20 text-purple-800 dark:text-purple-300 text-sm font-medium rounded-full">PHP</span>
                                <span class="px-3 py-1 bg-orange-100 dark:bg-orange-900/20 text-orange-800 dark:text-orange-300 text-sm font-medium rounded-full">MySQL</span>
                            </div>
                            
                            <!-- Social Links -->
                            <div class="flex space-x-4">
                                <a href="#" class="w-10 h-10 bg-blue-100 dark:bg-blue-900/20 hover:bg-blue-200 dark:hover:bg-blue-900/40 text-blue-600 dark:text-blue-400 rounded-lg flex items-center justify-center transition-colors">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                                    </svg>
                                </a>
                                <a href="#" class="w-10 h-10 bg-blue-100 dark:bg-blue-900/20 hover:bg-blue-200 dark:hover:bg-blue-900/40 text-blue-600 dark:text-blue-400 rounded-lg flex items-center justify-center transition-colors">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                                    </svg>
                                </a>
                                <a href="#" class="w-10 h-10 bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 text-gray-600 dark:text-gray-400 rounded-lg flex items-center justify-center transition-colors">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/>
                                    </svg>
                                </a>
                                <a href="#" class="w-10 h-10 bg-red-100 dark:bg-red-900/20 hover:bg-red-200 dark:hover:bg-red-900/40 text-red-600 dark:text-red-400 rounded-lg flex items-center justify-center transition-colors">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Additional Team Member -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center" x-data="{ show: false }" x-intersect="show = true">
                    <!-- Content -->
                    <div class="order-2 lg:order-1" x-show="show" x-transition.duration.1000ms>
                        <div class="space-y-6">
                            <div>
                                <h3 class="text-2xl md:text-3xl font-bold text-gray-900 dark:text-white mb-2">
                                    María González
                                </h3>
                                <p class="text-lg text-primary-600 dark:text-primary-400 font-medium mb-6">
                                    Especialista en Experiencia de Usuario
                                </p>
                            </div>
                            
                            <div class="prose prose-lg text-gray-600 dark:text-gray-300">
                                <p>
                                    María se encarga de que cada interacción en JobJuls sea intuitiva y significativa. Con experiencia 
                                    en diseño centrado en el usuario, se asegura de que tanto candidatos como empleadores tengan la mejor experiencia posible.
                                </p>
                                <p>
                                    Su enfoque en la investigación de usuarios y el diseño inclusivo ha sido clave para crear una plataforma 
                                    accesible y fácil de usar para todos.
                                </p>
                            </div>
                            
                            <!-- Skills -->
                            <div class="flex flex-wrap gap-2 mb-6">
                                <span class="px-3 py-1 bg-pink-100 dark:bg-pink-900/20 text-pink-800 dark:text-pink-300 text-sm font-medium rounded-full">UX Design</span>
                                <span class="px-3 py-1 bg-purple-100 dark:bg-purple-900/20 text-purple-800 dark:text-purple-300 text-sm font-medium rounded-full">Figma</span>
                                <span class="px-3 py-1 bg-blue-100 dark:bg-blue-900/20 text-blue-800 dark:text-blue-300 text-sm font-medium rounded-full">Research</span>
                                <span class="px-3 py-1 bg-green-100 dark:bg-green-900/20 text-green-800 dark:text-green-300 text-sm font-medium rounded-full">Accessibility</span>
                            </div>
                            
                            <!-- Social Links -->
                            <div class="flex space-x-4">
                                <a href="#" class="w-10 h-10 bg-blue-100 dark:bg-blue-900/20 hover:bg-blue-200 dark:hover:bg-blue-900/40 text-blue-600 dark:text-blue-400 rounded-lg flex items-center justify-center transition-colors">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                                    </svg>
                                </a>
                                <a href="#" class="w-10 h-10 bg-blue-100 dark:bg-blue-900/20 hover:bg-blue-200 dark:hover:bg-blue-900/40 text-blue-600 dark:text-blue-400 rounded-lg flex items-center justify-center transition-colors">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                                    </svg>
                                </a>
                                <a href="#" class="w-10 h-10 bg-pink-100 dark:bg-pink-900/20 hover:bg-pink-200 dark:hover:bg-pink-900/40 text-pink-600 dark:text-pink-400 rounded-lg flex items-center justify-center transition-colors">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 5.079 3.158 9.417 7.618 11.174-.105-.949-.199-2.405.042-3.441.219-.937 1.407-5.965 1.407-5.965s-.359-.719-.359-1.782c0-1.668.967-2.914 2.171-2.914 1.023 0 1.518.769 1.518 1.69 0 1.029-.655 2.568-.994 3.995-.283 1.194.599 2.169 1.777 2.169 2.133 0 3.772-2.249 3.772-5.495 0-2.873-2.064-4.882-5.012-4.882-3.414 0-5.418 2.561-5.418 5.207 0 1.031.397 2.138.893 2.738a.36.36 0 01.083.345l-.333 1.36c-.053.22-.174.267-.402.161-1.499-.698-2.436-2.889-2.436-4.649 0-3.785 2.75-7.262 7.929-7.262 4.163 0 7.398 2.967 7.398 6.931 0 4.136-2.607 7.464-6.227 7.464-1.216 0-2.357-.631-2.75-1.378l-.748 2.853c-.271 1.043-1.002 2.35-1.492 3.146C9.57 23.812 10.763 24.009 12.017 24c6.624 0 11.99-5.367 11.99-11.013C24.007 5.367 18.641.001 12.017.001z"/>
                                    </svg>
                                </a>
                                <a href="#" class="w-10 h-10 bg-purple-100 dark:bg-purple-900/20 hover:bg-purple-200 dark:hover:bg-purple-900/40 text-purple-600 dark:text-purple-400 rounded-lg flex items-center justify-center transition-colors">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M7.5 0h9C19.857 0 22.5 2.643 22.5 6v12c0 3.357-2.643 6-6 6h-9C3.143 24 .5 21.357.5 18V6C.5 2.643 3.143 0 6.5 0zm0 2A4.5 4.5 0 002 6.5v11A4.5 4.5 0 006.5 22h11a4.5 4.5 0 004.5-4.5v-11A4.5 4.5 0 0017.5 2h-11zm5.5 3a7 7 0 110 14 7 7 0 010-14zm0 2a5 5 0 100 10 5 5 0 000-10zm7.5-3.5a1.5 1.5 0 110 3 1.5 1.5 0 010-3z"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Image -->
                    <div class="order-1 lg:order-2" x-show="show" x-transition.duration.800ms>
                        <div class="relative">
                            <div class="aspect-w-4 aspect-h-5 rounded-2xl overflow-hidden shadow-xl">
                                <img src="{{ asset('assets/images/person_5.jpg') }}" 
                                     alt="María González" 
                                     class="w-full h-full object-cover">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent"></div>
                            </div>
                            
                            <!-- Floating Badge -->
                            <div class="absolute -bottom-4 -left-4 bg-white dark:bg-gray-800 rounded-xl shadow-lg p-4 border border-gray-100 dark:border-gray-700">
                                <div class="flex items-center space-x-3">
                                    <div class="w-8 h-8 bg-pink-100 dark:bg-pink-900/20 rounded-lg flex items-center justify-center">
                                        <svg class="w-5 h-5 text-pink-600 dark:text-pink-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zM21 5a2 2 0 00-2-2h-4a2 2 0 00-2 2v12a4 4 0 004 4h4a2 2 0 002-2V5z"></path>
                                        </svg>
                                    </div>
                                    <div>
                                        <div class="text-sm font-semibold text-gray-900 dark:text-white">UX Expert</div>
                                        <div class="text-xs text-gray-600 dark:text-gray-400">Certificada</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CTA Section -->
            <div class="text-center mt-16" x-data="{ show: false }" x-intersect="show = true">
                <div x-show="show" x-transition.duration.600ms class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-8 border border-gray-100 dark:border-gray-700">
                    <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">
                        ¿Quieres ser parte del equipo?
                    </h3>
                    <p class="text-gray-600 dark:text-gray-300 mb-6 max-w-2xl mx-auto">
                        Estamos siempre buscando talento excepcional para unirse a nuestra misión de transformar el mundo del trabajo.
                    </p>
                    <a href="{{ route('contact') }}" class="inline-flex items-center px-6 py-3 bg-primary-600 hover:bg-primary-700 text-white font-medium rounded-lg transition-colors">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
                        </svg>
                        Contáctanos
                    </a>
                </div>
            </div>
        </div>
    </section>

@endsection
