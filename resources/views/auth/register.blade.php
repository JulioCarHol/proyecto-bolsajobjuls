@extends('layouts.app')

@section('content')

<!-- Hero Section -->
<section class="relative min-h-screen bg-gradient-to-br from-emerald-600 via-teal-600 to-cyan-700 overflow-hidden flex items-center py-16">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-20">
        <div class="absolute inset-0" style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 50px 50px;"></div>
    </div>

    <!-- Floating Elements -->
    <div class="absolute top-16 left-16 w-20 h-20 bg-white bg-opacity-20 rounded-full animate-float"></div>
    <div class="absolute top-40 right-24 w-16 h-16 bg-emerald-300 bg-opacity-30 rounded-full animate-bounce-slow"></div>
    <div class="absolute bottom-32 left-1/4 w-14 h-14 bg-teal-300 bg-opacity-25 rounded-full animate-float-delayed"></div>

    <div class="relative z-10 w-full max-w-lg mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Register Card -->
        <div class="bg-white dark:bg-gray-800 rounded-3xl shadow-2xl overflow-hidden backdrop-blur-lg bg-opacity-95 dark:bg-opacity-95">
            <!-- Header -->
            <div class="bg-gradient-to-r from-emerald-600 to-teal-600 px-8 py-8 text-center">
                <div class="w-16 h-16 bg-white bg-opacity-20 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                    </svg>
                </div>
                <h1 class="text-3xl font-bold text-white mb-2">Crear Cuenta</h1>
                <p class="text-emerald-100">Únete a JobJuls y encuentra tu trabajo ideal</p>
            </div>

            <!-- Form -->
            <div class="p-8">
                <form method="POST" action="{{ route('register') }}" x-data="registerForm()">
                    @csrf

                    <!-- Name Field -->
                    <div class="mb-6">
                        <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Nombre Completo
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                </svg>
                            </div>
                            <input id="name" 
                                   type="text" 
                                   name="name"
                                   value="{{ old('name') }}" 
                                   required 
                                   autocomplete="name" 
                                   autofocus
                                   x-model="form.name"
                                   @input="validateName()"
                                   class="block w-full pl-10 pr-3 py-3 border border-gray-300 dark:border-gray-600 rounded-xl shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 dark:bg-gray-700 dark:text-white transition-all duration-200 @error('name') border-red-500 @enderror"
                                   placeholder="Tu nombre completo">
                        </div>
                        @error('name')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">
                                <svg class="w-4 h-4 inline mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Email Field -->
                    <div class="mb-6">
                        <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Correo Electrónico
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/>
                                </svg>
                            </div>
                            <input id="email" 
                                   type="email" 
                                   name="email"
                                   value="{{ old('email') }}" 
                                   required 
                                   autocomplete="email"
                                   x-model="form.email"
                                   @input="validateEmail()"
                                   class="block w-full pl-10 pr-3 py-3 border border-gray-300 dark:border-gray-600 rounded-xl shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 dark:bg-gray-700 dark:text-white transition-all duration-200 @error('email') border-red-500 @enderror"
                                   placeholder="tu@email.com">
                        </div>
                        @error('email')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">
                                <svg class="w-4 h-4 inline mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Password Field -->
                    <div class="mb-6">
                        <label for="password" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Contraseña
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                </svg>
                            </div>
                            <input id="password" 
                                   :type="showPassword ? 'text' : 'password'"
                                   name="password"
                                   required 
                                   autocomplete="new-password"
                                   x-model="form.password"
                                   @input="validatePassword()"
                                   class="block w-full pl-10 pr-12 py-3 border border-gray-300 dark:border-gray-600 rounded-xl shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 dark:bg-gray-700 dark:text-white transition-all duration-200 @error('password') border-red-500 @enderror"
                                   placeholder="••••••••">
                            <button type="button" 
                                    @click="showPassword = !showPassword"
                                    class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                <svg x-show="!showPassword" class="h-5 w-5 text-gray-400 hover:text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                                <svg x-show="showPassword" class="h-5 w-5 text-gray-400 hover:text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.268-2.943-9.543-7a9.97 9.97 0 011.563-3.029m5.858.908a3 3 0 114.243 4.243M9.878 9.878l4.242 4.242M9.878 9.878L3 3m6.878 6.878L21 21"/>
                                </svg>
                            </button>
                        </div>
                        <!-- Password Strength Indicator -->
                        <div class="mt-2" x-show="form.password.length > 0">
                            <div class="text-xs text-gray-600 dark:text-gray-400 mb-1">Seguridad de contraseña:</div>
                            <div class="flex space-x-1">
                                <div :class="passwordStrength >= 1 ? 'bg-red-500' : 'bg-gray-200 dark:bg-gray-600'" class="h-1 w-1/4 rounded"></div>
                                <div :class="passwordStrength >= 2 ? 'bg-yellow-500' : 'bg-gray-200 dark:bg-gray-600'" class="h-1 w-1/4 rounded"></div>
                                <div :class="passwordStrength >= 3 ? 'bg-blue-500' : 'bg-gray-200 dark:bg-gray-600'" class="h-1 w-1/4 rounded"></div>
                                <div :class="passwordStrength >= 4 ? 'bg-green-500' : 'bg-gray-200 dark:bg-gray-600'" class="h-1 w-1/4 rounded"></div>
                            </div>
                            <div class="text-xs mt-1" 
                                 :class="passwordStrength >= 3 ? 'text-green-600 dark:text-green-400' : 'text-yellow-600 dark:text-yellow-400'">
                                <span x-show="passwordStrength === 1">Débil</span>
                                <span x-show="passwordStrength === 2">Regular</span>
                                <span x-show="passwordStrength === 3">Buena</span>
                                <span x-show="passwordStrength === 4">Excelente</span>
                            </div>
                        </div>
                        @error('password')
                            <p class="mt-2 text-sm text-red-600 dark:text-red-400">
                                <svg class="w-4 h-4 inline mr-1" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                </svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Confirm Password Field -->
                    <div class="mb-6">
                        <label for="password-confirm" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                            Confirmar Contraseña
                        </label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5-7a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <input id="password-confirm" 
                                   type="password" 
                                   name="password_confirmation"
                                   required 
                                   autocomplete="new-password"
                                   x-model="form.passwordConfirmation"
                                   @input="validatePasswordConfirmation()"
                                   class="block w-full pl-10 pr-3 py-3 border border-gray-300 dark:border-gray-600 rounded-xl shadow-sm placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 dark:bg-gray-700 dark:text-white transition-all duration-200"
                                   placeholder="••••••••">
                        </div>
                        <div x-show="form.passwordConfirmation.length > 0 && !passwordsMatch" class="mt-2 text-sm text-red-600 dark:text-red-400">
                            <svg class="w-4 h-4 inline mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                            </svg>
                            Las contraseñas no coinciden
                        </div>
                        <div x-show="form.passwordConfirmation.length > 0 && passwordsMatch" class="mt-2 text-sm text-green-600 dark:text-green-400">
                            <svg class="w-4 h-4 inline mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            Las contraseñas coinciden
                        </div>
                    </div>

                    <!-- Terms and Privacy -->
                    <div class="mb-6">
                        <div class="flex items-start">
                            <input id="terms" 
                                   type="checkbox" 
                                   x-model="form.acceptTerms"
                                   class="h-4 w-4 text-emerald-600 focus:ring-emerald-500 border-gray-300 rounded mt-1">
                            <label for="terms" class="ml-2 block text-sm text-gray-700 dark:text-gray-300">
                                Acepto los 
                                <a href="#" class="text-emerald-600 dark:text-emerald-400 hover:text-emerald-700 dark:hover:text-emerald-300 underline">Términos de Servicio</a>
                                y la 
                                <a href="#" class="text-emerald-600 dark:text-emerald-400 hover:text-emerald-700 dark:hover:text-emerald-300 underline">Política de Privacidad</a>
                            </label>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" 
                            x-bind:disabled="!isFormValid"
                            x-bind:class="isFormValid ? 'bg-emerald-600 hover:bg-emerald-700 focus:ring-emerald-500 cursor-pointer' : 'bg-gray-400 cursor-not-allowed'"
                            class="w-full py-3 px-4 border border-transparent rounded-xl shadow-lg text-white font-semibold focus:outline-none focus:ring-2 focus:ring-offset-2 transition-all duration-200 transform hover:scale-105">
                        <svg class="w-5 h-5 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z"/>
                        </svg>
                        Crear Cuenta
                    </button>
                </form>

                <!-- Divider -->
                <div class="mt-8 mb-6">
                    <div class="relative">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-gray-300 dark:border-gray-600"></div>
                        </div>
                        <div class="relative flex justify-center text-sm">
                            <span class="px-2 bg-white dark:bg-gray-800 text-gray-500 dark:text-gray-400">¿Ya tienes cuenta?</span>
                        </div>
                    </div>
                </div>

                <!-- Login Link -->
                <a href="{{ route('login') }}" 
                   class="w-full flex justify-center py-3 px-4 border border-emerald-300 dark:border-emerald-600 rounded-xl shadow-sm text-emerald-600 dark:text-emerald-400 font-semibold hover:bg-emerald-50 dark:hover:bg-emerald-900 dark:hover:bg-opacity-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-emerald-500 transition-all duration-200">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"/>
                    </svg>
                    Iniciar sesión
                </a>
            </div>
        </div>

        <!-- Back to Home Link -->
        <div class="text-center mt-8">
            <a href="{{ url('/') }}" 
               class="text-white hover:text-emerald-200 transition-colors text-sm flex items-center justify-center">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Volver al inicio
            </a>
        </div>
    </div>
</section>

<script>
function registerForm() {
    return {
        form: {
            name: '{{ old('name') }}',
            email: '{{ old('email') }}',
            password: '',
            passwordConfirmation: '',
            acceptTerms: false
        },
        showPassword: false,
        
        get isFormValid() {
            return this.form.name.length > 0 && 
                   this.isValidEmail(this.form.email) &&
                   this.form.password.length >= 8 &&
                   this.passwordsMatch &&
                   this.form.acceptTerms;
        },
        
        get passwordsMatch() {
            return this.form.password === this.form.passwordConfirmation;
        },
        
        get passwordStrength() {
            const password = this.form.password;
            let strength = 0;
            
            if (password.length >= 8) strength++;
            if (/[a-z]/.test(password)) strength++;
            if (/[A-Z]/.test(password)) strength++;
            if (/[0-9]/.test(password)) strength++;
            if (/[^A-Za-z0-9]/.test(password)) strength++;
            
            return Math.min(strength, 4);
        },
        
        isValidEmail(email) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return emailRegex.test(email);
        },
        
        validateName() {
            // Validación adicional si es necesario
        },
        
        validateEmail() {
            // Validación adicional si es necesario
        },
        
        validatePassword() {
            // Validación adicional si es necesario
        },
        
        validatePasswordConfirmation() {
            // Validación adicional si es necesario
        }
    }
}
</script>

@endsection
