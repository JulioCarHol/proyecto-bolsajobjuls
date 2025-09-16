@extends('layouts.app')

@section('content')

<!-- Hero Section -->
<section class="relative min-h-[40vh] bg-gradient-to-br from-indigo-600 via-purple-600 to-pink-700 overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-20">
        <div class="absolute inset-0" style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 40px 40px;"></div>
    </div>

    <!-- Floating Elements -->
    <div class="absolute top-20 left-20 w-24 h-24 bg-white bg-opacity-20 rounded-full animate-float"></div>
    <div class="absolute top-32 right-32 w-16 h-16 bg-indigo-300 bg-opacity-30 rounded-full animate-bounce-slow"></div>
    <div class="absolute bottom-20 left-1/3 w-12 h-12 bg-purple-300 bg-opacity-25 rounded-full animate-float-delayed"></div>

    <div class="relative z-10 max-w-7xl mx-auto px-4 py-20 sm:px-6 lg:px-8">
        <div class="text-center">
            <!-- Breadcrumb -->
            <nav class="mb-8" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 md:space-x-3">
                    <li class="inline-flex items-center">
                        <a href="{{ route('home') }}" class="text-indigo-100 hover:text-white transition-colors duration-200">
                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"/>
                            </svg>
                            Inicio
                        </a>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-indigo-200" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                            </svg>
                            <a href="{{ route('profile') }}" class="text-indigo-100 hover:text-white transition-colors duration-200 ml-1 md:ml-2">Mi Perfil</a>
                        </div>
                    </li>
                    <li>
                        <div class="flex items-center">
                            <svg class="w-6 h-6 text-indigo-200" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"/>
                            </svg>
                            <span class="text-indigo-100 ml-1 md:ml-2">Actualizar CV</span>
                        </div>
                    </li>
                </ol>
            </nav>

            <!-- Title -->
            <h1 class="text-4xl md:text-5xl font-bold text-white mb-6">
                Actualizar 
                <span class="bg-gradient-to-r from-pink-400 to-yellow-500 bg-clip-text text-transparent">CV</span>
            </h1>
            <p class="text-xl text-indigo-100 max-w-2xl mx-auto">
                Sube tu currículum actualizado para mejores oportunidades profesionales
            </p>
        </div>
    </div>
</section>

<!-- Main Content -->
<section class="py-16 bg-gray-50 dark:bg-gray-900 min-h-screen">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        
        <!-- CV Upload Container -->
        <div class="bg-white dark:bg-gray-800 rounded-3xl shadow-2xl overflow-hidden">
            <!-- Header -->
            <div class="bg-gradient-to-r from-indigo-600 to-purple-600 px-8 py-6">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <div class="w-12 h-12 bg-white bg-opacity-20 rounded-lg flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>
                    </div>
                    <div class="ml-4">
                        <h2 class="text-2xl font-bold text-white">Actualizar CV</h2>
                        <p class="text-indigo-100">Sube la versión más reciente de tu currículum</p>
                    </div>
                </div>
            </div>

            <!-- Form -->
            <form class="p-8" action="{{ route('update.cv') }}" method="post" enctype="multipart/form-data" x-data="cvUploadForm()">
                @csrf

                <!-- Current CV Info -->
                <div class="mb-8 p-6 bg-blue-50 dark:bg-blue-900 dark:bg-opacity-50 rounded-2xl">
                    <h3 class="text-lg font-semibold text-blue-900 dark:text-blue-100 mb-3 flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        Información Actual
                    </h3>
                    <p class="text-blue-700 dark:text-blue-200">
                        @if(auth()->user()->userDetails && auth()->user()->userDetails->cv)
                            Tu CV actual está disponible. Puedes subir uno nuevo para reemplazarlo.
                        @else
                            Aún no has subido un CV. Es importante tener un currículum actualizado para aplicar a empleos.
                        @endif
                    </p>
                </div>

                <!-- Upload Area -->
                <div class="mb-8">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-4">
                        Subir Nuevo CV *
                    </label>
                    
                    <!-- Drag & Drop Zone -->
                    <div class="relative">
                        <div x-ref="dropzone"
                             @dragover.prevent="isDragOver = true"
                             @dragleave.prevent="isDragOver = false"
                             @drop.prevent="handleDrop($event)"
                             :class="isDragOver ? 'border-indigo-500 bg-indigo-50 dark:bg-indigo-900 dark:bg-opacity-50' : 'border-gray-300 dark:border-gray-600'"
                             class="border-2 border-dashed rounded-2xl p-8 text-center transition-all duration-300 hover:border-indigo-400 hover:bg-gray-50 dark:hover:bg-gray-700">
                            
                            <!-- Upload Icon -->
                            <div class="mb-4">
                                <svg class="mx-auto h-16 w-16 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                                </svg>
                            </div>

                            <!-- Upload Text -->
                            <div class="space-y-2">
                                <p class="text-xl font-semibold text-gray-900 dark:text-white">
                                    Arrastra tu CV aquí
                                </p>
                                <p class="text-gray-600 dark:text-gray-300">
                                    o 
                                    <button type="button" 
                                            @click="$refs.fileInput.click()"
                                            class="text-indigo-600 dark:text-indigo-400 font-semibold hover:text-indigo-700 dark:hover:text-indigo-300 underline">
                                        selecciona un archivo
                                    </button>
                                </p>
                                <p class="text-sm text-gray-500 dark:text-gray-400">
                                    PDF, DOC, DOCX hasta 10MB
                                </p>
                            </div>

                            <!-- Hidden File Input -->
                            <input type="file" 
                                   x-ref="fileInput"
                                   name="cv" 
                                   accept=".pdf,.doc,.docx"
                                   @change="handleFileSelect($event)"
                                   class="hidden">
                        </div>

                        <!-- File Preview -->
                        <div x-show="selectedFile" x-transition class="mt-4 p-4 bg-green-50 dark:bg-green-900 dark:bg-opacity-50 rounded-xl border border-green-200 dark:border-green-700">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center space-x-3">
                                    <div class="flex-shrink-0">
                                        <svg class="h-8 w-8 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-green-800 dark:text-green-100" x-text="selectedFile ? selectedFile.name : ''"></p>
                                        <p class="text-xs text-green-600 dark:text-green-300" x-text="selectedFile ? formatFileSize(selectedFile.size) : ''"></p>
                                    </div>
                                </div>
                                <button type="button" 
                                        @click="removeFile()"
                                        class="text-green-600 dark:text-green-400 hover:text-green-800 dark:hover:text-green-200">
                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Error Messages -->
                    <div x-show="errorMessage" x-transition class="mt-4 p-4 bg-red-50 dark:bg-red-900 dark:bg-opacity-50 rounded-xl border border-red-200 dark:border-red-700">
                        <div class="flex">
                            <svg class="h-5 w-5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <p class="ml-3 text-sm text-red-700 dark:text-red-200" x-text="errorMessage"></p>
                        </div>
                    </div>
                </div>

                <!-- Upload Guidelines -->
                <div class="mb-8 p-6 bg-yellow-50 dark:bg-yellow-900 dark:bg-opacity-50 rounded-2xl">
                    <h4 class="text-lg font-semibold text-yellow-900 dark:text-yellow-100 mb-3 flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        Consejos para tu CV
                    </h4>
                    <ul class="space-y-2 text-yellow-800 dark:text-yellow-200 text-sm">
                        <li class="flex items-start">
                            <svg class="w-4 h-4 mr-2 mt-0.5 text-yellow-600 dark:text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            Usa un formato profesional y fácil de leer
                        </li>
                        <li class="flex items-start">
                            <svg class="w-4 h-4 mr-2 mt-0.5 text-yellow-600 dark:text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            Incluye información de contacto actualizada
                        </li>
                        <li class="flex items-start">
                            <svg class="w-4 h-4 mr-2 mt-0.5 text-yellow-600 dark:text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            Destaca tus habilidades y experiencia relevante
                        </li>
                        <li class="flex items-start">
                            <svg class="w-4 h-4 mr-2 mt-0.5 text-yellow-600 dark:text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            Mantén un tamaño de archivo menor a 10MB
                        </li>
                    </ul>
                </div>

                <!-- Submit Buttons -->
                <div class="flex items-center justify-between pt-8 border-t border-gray-200 dark:border-gray-700">
                    <a href="{{ route('profile') }}" 
                       class="inline-flex items-center px-6 py-3 border border-gray-300 dark:border-gray-600 shadow-sm text-base font-medium rounded-xl text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all duration-200">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        Volver al Perfil
                    </a>
                    
                    <button type="submit" 
                            x-bind:disabled="!selectedFile"
                            x-bind:class="selectedFile ? 'bg-indigo-600 hover:bg-indigo-700 focus:ring-indigo-500 cursor-pointer' : 'bg-gray-400 cursor-not-allowed'"
                            class="inline-flex items-center px-8 py-3 border border-transparent text-base font-medium rounded-xl text-white shadow-lg focus:outline-none focus:ring-2 focus:ring-offset-2 transition-all duration-200 transform hover:scale-105">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                        </svg>
                        Subir CV
                    </button>
                </div>
            </form>
        </div>
    </div>
</section>

<script>
function cvUploadForm() {
    return {
        selectedFile: null,
        isDragOver: false,
        errorMessage: '',
        
        handleFileSelect(event) {
            const file = event.target.files[0];
            this.validateAndSetFile(file);
        },
        
        handleDrop(event) {
            this.isDragOver = false;
            const file = event.dataTransfer.files[0];
            this.validateAndSetFile(file);
        },
        
        validateAndSetFile(file) {
            this.errorMessage = '';
            
            if (!file) return;
            
            // Validate file type
            const allowedTypes = ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'];
            if (!allowedTypes.includes(file.type)) {
                this.errorMessage = 'Por favor selecciona un archivo PDF, DOC o DOCX.';
                return;
            }
            
            // Validate file size (10MB)
            if (file.size > 10 * 1024 * 1024) {
                this.errorMessage = 'El archivo es demasiado grande. El tamaño máximo es 10MB.';
                return;
            }
            
            this.selectedFile = file;
        },
        
        removeFile() {
            this.selectedFile = null;
            this.$refs.fileInput.value = '';
        },
        
        formatFileSize(bytes) {
            if (bytes === 0) return '0 Bytes';
            const k = 1024;
            const sizes = ['Bytes', 'KB', 'MB', 'GB'];
            const i = Math.floor(Math.log(bytes) / Math.log(k));
            return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
        }
    }
}
</script>

@endsection
