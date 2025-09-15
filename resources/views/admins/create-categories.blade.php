@extends('layouts.admin')

@section('title', 'Crear Categoría - Panel de Admin')
@section('page-title', 'Crear Categoría')

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
    <a href="{{ route('display.categories') }}" class="text-purple-600 dark:text-purple-400 hover:underline">
        Categorías
    </a>
</li>
<li class="flex items-center">
    <svg class="w-4 h-4 mx-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
    </svg>
    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
    </svg>
    Crear Categoría
</li>
@endsection

@section('content')
<div class="max-w-2xl mx-auto space-y-6">
    <!-- Header -->
    <div class="bg-gradient-to-r from-purple-500 to-purple-600 rounded-xl p-6 text-white">
        <div class="flex items-center">
            <div class="bg-white/20 rounded-lg p-3 mr-4">
                <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                </svg>
            </div>
            <div>
                <h2 class="text-2xl font-bold mb-1">Crear Nueva Categoría</h2>
                <p class="text-purple-100">Añade una nueva categoría para clasificar empleos</p>
            </div>
        </div>
    </div>

    <!-- Formulario -->
    <div class="card-modern">
        <form method="POST" action="{{ route('create.categories') }}" enctype="multipart/form-data" class="space-y-6">
            @csrf
            
            <!-- Campo Nombre de Categoría -->
            <div class="space-y-2">
                <label for="nombre" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                    <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"></path>
                    </svg>
                    Nombre de la Categoría
                </label>
                <input 
                    type="text" 
                    name="nombre" 
                    id="nombre" 
                    class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-transparent dark:bg-gray-700 dark:text-white transition-colors duration-200 @error('create') border-red-500 ring-2 ring-red-200 @enderror" 
                    placeholder="Ej: Tecnología, Marketing, Ventas..."
                    value="{{ old('nombre') }}"
                />
                @error('create')
                    <div class="flex items-center mt-2 text-sm text-red-600 dark:text-red-400">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                        {{ $message }}
                    </div>
                @enderror
                <p class="text-xs text-gray-500 dark:text-gray-400">
                    El nombre debe ser único y descriptivo para facilitar la clasificación de empleos.
                </p>
            </div>

            <!-- Botones de acción -->
            <div class="flex items-center justify-between pt-4 border-t border-gray-200 dark:border-gray-600">
                <a href="{{ route('display.categories') }}" 
                   class="inline-flex items-center px-4 py-2 border border-gray-300 dark:border-gray-600 rounded-lg text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 transition-colors duration-200">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Cancelar
                </a>
                
                <button 
                    type="submit" 
                    name="submit" 
                    class="inline-flex items-center px-6 py-3 bg-purple-600 hover:bg-purple-700 text-white text-sm font-medium rounded-lg transition-colors duration-200 shadow-sm hover:shadow-md focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Crear Categoría
                </button>
            </div>
        </form>
    </div>

    <!-- Ejemplos de categorías -->
    <div class="bg-purple-50 dark:bg-purple-900/20 border border-purple-200 dark:border-purple-800 rounded-lg p-4">
        <div class="flex items-start">
            <svg class="w-5 h-5 text-purple-600 dark:text-purple-400 mr-3 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"></path>
            </svg>
            <div>
                <h4 class="text-sm font-medium text-purple-800 dark:text-purple-200 mb-2">
                    Ejemplos de categorías populares
                </h4>
                <div class="grid grid-cols-2 gap-2 text-sm text-purple-700 dark:text-purple-300">
                    <div class="flex items-center">
                        <span class="w-1.5 h-1.5 bg-purple-500 rounded-full mr-2"></span>
                        Tecnología e IT
                    </div>
                    <div class="flex items-center">
                        <span class="w-1.5 h-1.5 bg-purple-500 rounded-full mr-2"></span>
                        Marketing Digital
                    </div>
                    <div class="flex items-center">
                        <span class="w-1.5 h-1.5 bg-purple-500 rounded-full mr-2"></span>
                        Recursos Humanos
                    </div>
                    <div class="flex items-center">
                        <span class="w-1.5 h-1.5 bg-purple-500 rounded-full mr-2"></span>
                        Finanzas y Contabilidad
                    </div>
                    <div class="flex items-center">
                        <span class="w-1.5 h-1.5 bg-purple-500 rounded-full mr-2"></span>
                        Diseño y Creatividad
                    </div>
                    <div class="flex items-center">
                        <span class="w-1.5 h-1.5 bg-purple-500 rounded-full mr-2"></span>
                        Ventas y Comercial
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
