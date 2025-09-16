@extends('layouts.app')

@section('content')

<!-- Hero Section -->
<div style="background: linear-gradient(135deg, #1e40af 0%, #3b82f6 50%, #60a5fa 100%); color: white; padding: 60px 20px; margin-top: -25px;">
    <div style="max-width: 1200px; margin: 0 auto;">
        <div style="margin-bottom: 20px;">
            <nav style="margin-bottom: 30px;">
                <a href="{{ route('home') }}" style="color: #93c5fd; text-decoration: none;">Inicio</a>
                <span style="margin: 0 10px; color: #93c5fd;">/</span>
                <a href="#" style="color: #93c5fd; text-decoration: none;">Trabajos</a>
                <span style="margin: 0 10px; color: #93c5fd;">/</span>
                <span style="color: white; font-weight: bold;">{{ $job->titulo_trabajo }}</span>
            </nav>
            
            <h1 style="font-size: 2.5rem; font-weight: bold; margin-bottom: 10px; color: white;">
                Vacante Disponible
            </h1>
            <p style="font-size: 1.125rem; color: #dbeafe; max-width: 600px;">
                Descubre una oportunidad única para hacer crecer tu carrera profesional
            </p>
        </div>
    </div>
</div>

<!-- Notifications -->
@if(\Session::has('save'))
    <div style="background-color: #dcfce7; border: 1px solid #16a34a; color: #15803d; padding: 12px 20px; margin: 20px auto; max-width: 1200px; border-radius: 8px;">
        <p style="margin: 0;">✅ {!! \Session::get('save') !!}</p>
    </div>
@endif

@if(\Session::has('apply'))
    <div style="background-color: #dcfce7; border: 1px solid #16a34a; color: #15803d; padding: 12px 20px; margin: 20px auto; max-width: 1200px; border-radius: 8px;">
        <p style="margin: 0;">✅ {!! \Session::get('apply') !!}</p>
    </div>
@endif

@if(\Session::has('applied'))
    <div style="background-color: #dcfce7; border: 1px solid #16a34a; color: #15803d; padding: 12px 20px; margin: 20px auto; max-width: 1200px; border-radius: 8px;">
        <p style="margin: 0;">✅ {!! \Session::get('applied') !!}</p>
    </div>
@endif

<!-- Main Content -->
<div style="padding: 80px 20px; background-color: #f9fafb;">
    <div style="max-width: 1200px; margin: 0 auto;">
        
        <!-- Job Header -->
        <div style="display: flex; align-items: center; margin-bottom: 40px; background-color: white; padding: 30px; border-radius: 16px; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);">
            <div style="width: 80px; height: 80px; background-color: #f3f4f6; border-radius: 12px; display: flex; align-items: center; justify-content: center; margin-right: 24px; flex-shrink: 0;">
                <img src="{{ asset('assets/images/job_logo_5.jpg') }}" alt="Company Logo" style="width: 60px; height: 60px; border-radius: 8px; object-fit: cover;">
            </div>
            <div style="flex: 1;">
                <h1 style="font-size: 2rem; font-weight: bold; color: #111827; margin-bottom: 12px;">
                    {{ $job->titulo_trabajo }}
                </h1>
                <div style="display: flex; flex-wrap: wrap; gap: 20px; align-items: center;">
                    <div style="display: flex; align-items: center; color: #6b7280;">
                        <span style="margin-right: 8px;">🏢</span>
                        <span style="font-weight: 500;">{{ $job->empresa }}</span>
                    </div>
                    <div style="display: flex; align-items: center; color: #6b7280;">
                        <span style="margin-right: 8px;">📍</span>
                        <span>{{ $job->region_trabajo }}</span>
                    </div>
                    <div style="display: flex; align-items: center;">
                        <span style="margin-right: 8px;">⏰</span>
                        <span style="background-color: #dbeafe; color: #1e40af; padding: 4px 12px; border-radius: 20px; font-size: 0.875rem; font-weight: 500;">
                            {{ $job->tipo_trabajo }}
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Two Column Layout -->
        <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 40px;">
            
            <!-- Main Content Column -->
            <div>
                <!-- Job Image -->
                <div style="margin-bottom: 40px;">
                    <img src="{{ asset('assets/images/job_single_img_1.jpg') }}" 
                         alt="Job Image" 
                         style="width: 100%; height: 300px; object-fit: cover; border-radius: 12px; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);">
                </div>

                <!-- Job Description -->
                <div style="background-color: white; padding: 30px; border-radius: 16px; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1); margin-bottom: 30px;">
                    <div style="display: flex; align-items: center; margin-bottom: 20px;">
                        <span style="font-size: 1.5rem; margin-right: 12px;">📝</span>
                        <h2 style="font-size: 1.5rem; font-weight: bold; color: #1e40af; margin: 0;">Descripción</h2>
                    </div>
                    <p style="color: #4b5563; line-height: 1.6; margin: 0; font-size: 1rem;">
                        {{ $job->descripcion_trabajo }}
                    </p>
                </div>

                <!-- Responsibilities -->
                <div style="background-color: white; padding: 30px; border-radius: 16px; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1); margin-bottom: 30px;">
                    <div style="display: flex; align-items: center; margin-bottom: 20px;">
                        <span style="font-size: 1.5rem; margin-right: 12px;">🚀</span>
                        <h2 style="font-size: 1.5rem; font-weight: bold; color: #1e40af; margin: 0;">Responsabilidades</h2>
                    </div>
                    <p style="color: #4b5563; line-height: 1.6; margin: 0; font-size: 1rem;">
                        {{ $job->responsabilidades }}
                    </p>
                </div>

                <!-- Education and Experience -->
                <div style="background-color: white; padding: 30px; border-radius: 16px; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1); margin-bottom: 30px;">
                    <div style="display: flex; align-items: center; margin-bottom: 20px;">
                        <span style="font-size: 1.5rem; margin-right: 12px;">🎓</span>
                        <h2 style="font-size: 1.5rem; font-weight: bold; color: #1e40af; margin: 0;">Educación y Experiencia</h2>
                    </div>
                    <p style="color: #4b5563; line-height: 1.6; margin: 0; font-size: 1rem;">
                        {{ $job->educacion_experiencia }}
                    </p>
                </div>

                <!-- Other Benefits -->
                <div style="background-color: white; padding: 30px; border-radius: 16px; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1); margin-bottom: 30px;">
                    <div style="display: flex; align-items: center; margin-bottom: 20px;">
                        <span style="font-size: 1.5rem; margin-right: 12px;">🎁</span>
                        <h2 style="font-size: 1.5rem; font-weight: bold; color: #1e40af; margin: 0;">Otros Beneficios</h2>
                    </div>
                    <p style="color: #4b5563; line-height: 1.6; margin: 0; font-size: 1rem;">
                        {{ $job->otrosbeneficios }}
                    </p>
                </div>

                <!-- Action Buttons -->
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 40px;">
                    <!-- Save Job Button -->
                    @if(isset(Auth::user()->id))
                    <form action="{{ route('save.job') }}" method="POST">
                        @csrf
                        <input name="job_id" type="hidden" value="{{ $job->id }}">
                        <input name="user_id" type="hidden" value="{{ Auth::user()->id }}">
                        <input name="imagen" type="hidden" value="{{ $job->imagen }}">
                        <input name="titulo_trabajo" type="hidden" value="{{ $job->titulo_trabajo }}">
                        <input name="region_trabajo" type="hidden" value="{{ $job->region_trabajo }}">
                        <input name="tipo_trabajo" type="hidden" value="{{ $job->tipo_trabajo }}">
                        <input name="empresa" type="hidden" value="{{ $job->empresa }}">

                        @if($savedJob > 0)
                            <button style="width: 100%; padding: 16px; background-color: #f3f4f6; color: #6b7280; border: none; border-radius: 8px; font-weight: 500; cursor: not-allowed;" disabled>
                                ❤️ Trabajo guardado
                            </button>
                        @else
                            <button type="submit" style="width: 100%; padding: 16px; background-color: white; color: #374151; border: 2px solid #d1d5db; border-radius: 8px; font-weight: 500; cursor: pointer; transition: all 0.2s;">
                                💾 Guardar empleo
                            </button>
                        @endif
                    </form>
                    @endif

                    <!-- Apply Button -->
                    <form action="{{ route('apply.job') }}" method="POST">
                        @csrf
                        <input name="job_id" type="hidden" value="{{ $job->id }}">
                        <input name="imagen" type="hidden" value="{{ $job->imagen }}">
                        <input name="titulo_trabajo" type="hidden" value="{{ $job->titulo_trabajo }}">
                        <input name="region_trabajo" type="hidden" value="{{ $job->region_trabajo }}">
                        <input name="tipo_trabajo" type="hidden" value="{{ $job->tipo_trabajo }}">
                        <input name="empresa" type="hidden" value="{{ $job->empresa }}">

                        @if(isset(Auth::user()->id))
                            @if($appliedJob > 0)
                                <button style="width: 100%; padding: 16px; background-color: #16a34a; color: white; border: none; border-radius: 8px; font-weight: 600; cursor: not-allowed;" disabled>
                                    ✅ Ya aplicaste a este empleo
                                </button>
                            @else
                                <button type="submit" style="width: 100%; padding: 16px; background-color: #2563eb; color: white; border: none; border-radius: 8px; font-weight: 600; cursor: pointer; transition: background-color 0.2s;">
                                    🚀 Aplicar Ahora
                                </button>
                            @endif
                        @else
                            <a href="{{ route('login') }}" style="display: block; width: 100%; padding: 16px; background-color: #2563eb; color: white; text-decoration: none; border-radius: 8px; font-weight: 600; text-align: center; transition: background-color 0.2s;">
                                🔑 Iniciar Sesión para Aplicar
                            </a>
                        @endif
                    </form>
                </div>
            </div>

            <!-- Sidebar Column -->
            <div>
                <!-- Job Details Card -->
                <div style="background-color: white; padding: 30px; border-radius: 16px; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1); margin-bottom: 30px;">
                    <h3 style="color: #1e40af; font-size: 1.25rem; font-weight: bold; margin-bottom: 20px; display: flex; align-items: center;">
                        <span style="margin-right: 8px;">📋</span>
                        Descripción del puesto
                    </h3>
                    <div style="display: flex; flex-direction: column; gap: 16px;">
                        <div style="display: flex; justify-content: space-between; padding-bottom: 8px; border-bottom: 1px solid #e5e7eb;">
                            <span style="font-weight: 600; color: #374151;">Publicado en:</span>
                            <span style="color: #6b7280;">{{ date('Y-m-d', strtotime($job->fecha_creacion)) }}</span>
                        </div>
                        <div style="display: flex; justify-content: space-between; padding-bottom: 8px; border-bottom: 1px solid #e5e7eb;">
                            <span style="font-weight: 600; color: #374151;">Vacante:</span>
                            <span style="color: #6b7280;">{{ $job->vacante }}</span>
                        </div>
                        <div style="display: flex; justify-content: space-between; padding-bottom: 8px; border-bottom: 1px solid #e5e7eb;">
                            <span style="font-weight: 600; color: #374151;">Jornada:</span>
                            <span style="color: #6b7280;">{{ $job->tipo_trabajo }}</span>
                        </div>
                        <div style="display: flex; justify-content: space-between; padding-bottom: 8px; border-bottom: 1px solid #e5e7eb;">
                            <span style="font-weight: 600; color: #374151;">Experiencia:</span>
                            <span style="color: #6b7280;">{{ $job->experiencia }}</span>
                        </div>
                        <div style="display: flex; justify-content: space-between; padding-bottom: 8px; border-bottom: 1px solid #e5e7eb;">
                            <span style="font-weight: 600; color: #374151;">Lugar de trabajo:</span>
                            <span style="color: #6b7280;">{{ $job->region_trabajo }}</span>
                        </div>
                        <div style="display: flex; justify-content: space-between; padding-bottom: 8px; border-bottom: 1px solid #e5e7eb;">
                            <span style="font-weight: 600; color: #374151;">Salario:</span>
                            <span style="color: #16a34a; font-weight: 600;">{{ $job->salario }}</span>
                        </div>
                        <div style="display: flex; justify-content: space-between; padding-bottom: 8px; border-bottom: 1px solid #e5e7eb;">
                            <span style="font-weight: 600; color: #374151;">Género:</span>
                            <span style="color: #6b7280;">{{ $job->genero }}</span>
                        </div>
                        <div style="display: flex; justify-content: space-between;">
                            <span style="font-weight: 600; color: #374151;">Plazo solicitud:</span>
                            <span style="color: #dc2626; font-weight: 500;">{{ date('Y-m-d', strtotime($job->fecha_creacion . ' +15 days')) }}</span>
                        </div>
                    </div>
                </div>

                <!-- Categories Card -->
                <div style="background-color: white; padding: 30px; border-radius: 16px; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1); margin-bottom: 30px;">
                    <h3 style="color: #1e40af; font-size: 1.25rem; font-weight: bold; margin-bottom: 20px; display: flex; align-items: center;">
                        <span style="margin-right: 8px;">📂</span>
                        Categorías
                    </h3>
                    <div style="display: flex; flex-direction: column; gap: 12px;">
                        @foreach($categories as $category)
                            <a href="{{ route('categories.single', $category->nombre) }}" 
                               style="color: #3b82f6; text-decoration: none; padding: 8px 0; border-bottom: 1px solid #f3f4f6; display: flex; justify-content: space-between; transition: color 0.2s;">
                                <span>{{ $category->nombre }}</span>
                                <span style="background-color: #f3f4f6; color: #6b7280; padding: 2px 8px; border-radius: 12px; font-size: 0.75rem;">
                                    {{ $category->total }}
                                </span>
                            </a>
                        @endforeach
                    </div>
                </div>

                <!-- Share Card -->
                <div style="background-color: white; padding: 30px; border-radius: 16px; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);">
                    <h3 style="color: #1e40af; font-size: 1.25rem; font-weight: bold; margin-bottom: 20px; display: flex; align-items: center;">
                        <span style="margin-right: 8px;">📤</span>
                        Compartir
                    </h3>
                    <div style="display: flex; gap: 12px;">
                        <a href="https://www.facebook.com/" target="_blank" 
                           style="width: 44px; height: 44px; background-color: #1877f2; color: white; border-radius: 8px; display: flex; align-items: center; justify-content: center; text-decoration: none; transition: transform 0.2s;">
                            📘
                        </a>
                        <a href="https://twitter.com/" target="_blank" 
                           style="width: 44px; height: 44px; background-color: #1da1f2; color: white; border-radius: 8px; display: flex; align-items: center; justify-content: center; text-decoration: none; transition: transform 0.2s;">
                            🐦
                        </a>
                        <a href="https://www.linkedin.com/" target="_blank" 
                           style="width: 44px; height: 44px; background-color: #0077b5; color: white; border-radius: 8px; display: flex; align-items: center; justify-content: center; text-decoration: none; transition: transform 0.2s;">
                            💼
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Related Jobs Section -->
<div style="padding: 80px 20px; background-color: white;">
    <div style="max-width: 1200px; margin: 0 auto;">
        
        <!-- Section Header -->
        <div style="text-align: center; margin-bottom: 50px;">
            <div style="background-color: #dbeafe; color: #1e40af; padding: 8px 16px; border-radius: 20px; display: inline-block; margin-bottom: 20px; font-size: 14px; font-weight: 500;">
                🔗 Empleos relacionados
            </div>
            <h2 style="font-size: 2.5rem; font-weight: bold; color: #111827; margin-bottom: 12px;">
                {{ $relatedJobsCount }} Trabajos Relacionados
            </h2>
            <p style="color: #6b7280; font-size: 1.125rem; max-width: 600px; margin: 0 auto;">
                Descubre más oportunidades que podrían interesarte en la misma categoría
            </p>
        </div>

        <!-- Jobs Grid -->
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 24px;">
            @foreach($relatedJobs as $relatedJob)
                <div style="background-color: #f9fafb; border-radius: 16px; padding: 24px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05); transition: all 0.2s; border: 1px solid #e5e7eb;">
                    <a href="{{ route('single.job', $relatedJob->id) }}" style="text-decoration: none; color: inherit;">
                        
                        <!-- Company Logo -->
                        <div style="display: flex; align-items: center; margin-bottom: 16px;">
                            <div style="width: 48px; height: 48px; background-color: white; border-radius: 8px; display: flex; align-items: center; justify-content: center; margin-right: 12px; flex-shrink: 0;">
                                <img src="{{ asset('assets/images/'.$relatedJob->imagen) }}" 
                                     alt="Company Logo" 
                                     style="width: 36px; height: 36px; border-radius: 6px; object-fit: cover;">
                            </div>
                            <div style="flex: 1;">
                                <h3 style="font-size: 1.125rem; font-weight: 600; color: #111827; margin: 0 0 4px 0; line-height: 1.3;">
                                    {{ $relatedJob->titulo_trabajo }}
                                </h3>
                                <p style="color: #6b7280; font-size: 0.875rem; margin: 0; font-weight: 500;">
                                    {{ $relatedJob->empresa }}
                                </p>
                            </div>
                        </div>

                        <!-- Job Details -->
                        <div style="display: flex; flex-direction: column; gap: 8px; margin-bottom: 16px;">
                            <div style="display: flex; align-items: center; color: #6b7280; font-size: 0.875rem;">
                                <span style="margin-right: 6px;">📍</span>
                                <span>{{ $relatedJob->region_trabajo }}</span>
                            </div>
                            <div style="display: flex; align-items: center;">
                                <span style="background-color: #fef3c7; color: #d97706; padding: 4px 8px; border-radius: 12px; font-size: 0.75rem; font-weight: 500;">
                                    {{ $relatedJob->tipo_trabajo }}
                                </span>
                            </div>
                        </div>

                        <!-- View Job Button -->
                        <div style="margin-top: 16px; padding-top: 16px; border-top: 1px solid #e5e7eb;">
                            <span style="color: #3b82f6; font-size: 0.875rem; font-weight: 500;">
                                Ver detalles →
                            </span>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>

        <!-- Call to Action -->
        @if($relatedJobsCount > 0)
        <div style="text-align: center; margin-top: 50px;">
            <a href="{{ route('home') }}" 
               style="background-color: #2563eb; color: white; padding: 16px 32px; border-radius: 8px; text-decoration: none; font-weight: 600; transition: background-color 0.2s;">
                🔍 Ver todos los empleos
            </a>
        </div>
        @endif
    </div>
</div>

@endsection
