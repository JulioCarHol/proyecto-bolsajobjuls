@extends('layouts.app')

@section('content')

<!-- Hero Section -->
<div style="background-color: #2563eb; color: white; padding: 80px 20px; text-align: center;">
    <div style="max-width: 1200px; margin: 0 auto;">
        <nav style="margin-bottom: 30px;">
            <a href="{{ route('home') }}" style="color: #93c5fd; text-decoration: none;">Inicio</a>
            <span style="margin: 0 10px;">></span>
            <span style="color: white;">Contacto</span>
        </nav>
        
        <h1 style="font-size: 3rem; font-weight: bold; margin-bottom: 20px; line-height: 1.2;">
            Hablemos sobre tu
            <span style="color: #fbbf24;">futuro</span>
        </h1>
        <p style="font-size: 1.25rem; margin-bottom: 0; max-width: 600px; margin-left: auto; margin-right: auto;">
            ¿Tienes preguntas? ¿Quieres conocer más sobre JobJuls? Estamos aquí para ayudarte a encontrar las respuestas que necesitas.
        </p>
    </div>
</div>

<!-- Contact Form Section -->
<div id="contact-form" style="padding: 80px 20px; background-color: #f9fafb;">
    <div style="max-width: 1200px; margin: 0 auto;">
        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 60px;">
            
            <!-- Contact Form -->
            <div>
                <div style="background-color: #dbeafe; color: #1e40af; padding: 8px 16px; border-radius: 20px; display: inline-block; margin-bottom: 30px; font-size: 14px; font-weight: 500;">
                    📧 Envíanos un mensaje
                </div>
                
                <h2 style="font-size: 2.5rem; font-weight: bold; color: #111827; margin-bottom: 20px;">
                    ¿En qué podemos ayudarte?
                </h2>
                
                <p style="font-size: 1.125rem; color: #6b7280; margin-bottom: 40px;">
                    Completa el formulario y nos pondremos en contacto contigo en las próximas 24 horas. 
                    Tu mensaje es importante para nosotros.
                </p>

                <!-- Contact Form -->
                <form style="display: flex; flex-direction: column; gap: 24px;">
                    <!-- Name Fields -->
                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                        <div>
                            <label style="display: block; font-weight: 500; color: #111827; margin-bottom: 8px;">
                                Nombre *
                            </label>
                            <input type="text" 
                                   placeholder="Tu nombre"
                                   style="width: 100%; padding: 12px 16px; border: 1px solid #d1d5db; border-radius: 8px; background-color: white; color: #111827;">
                        </div>
                        <div>
                            <label style="display: block; font-weight: 500; color: #111827; margin-bottom: 8px;">
                                Apellido *
                            </label>
                            <input type="text" 
                                   placeholder="Tu apellido"
                                   style="width: 100%; padding: 12px 16px; border: 1px solid #d1d5db; border-radius: 8px; background-color: white; color: #111827;">
                        </div>
                    </div>

                    <!-- Email Field -->
                    <div>
                        <label style="display: block; font-weight: 500; color: #111827; margin-bottom: 8px;">
                            Correo Electrónico *
                        </label>
                        <input type="email" 
                               placeholder="tu@ejemplo.com"
                               style="width: 100%; padding: 12px 16px; border: 1px solid #d1d5db; border-radius: 8px; background-color: white; color: #111827;">
                    </div>

                    <!-- Subject Field -->
                    <div>
                        <label style="display: block; font-weight: 500; color: #111827; margin-bottom: 8px;">
                            Asunto *
                        </label>
                        <input type="text" 
                               placeholder="¿De qué quieres hablar?"
                               style="width: 100%; padding: 12px 16px; border: 1px solid #d1d5db; border-radius: 8px; background-color: white; color: #111827;">
                    </div>

                    <!-- Message Field -->
                    <div>
                        <label style="display: block; font-weight: 500; color: #111827; margin-bottom: 8px;">
                            Mensaje *
                        </label>
                        <textarea rows="6"
                                  placeholder="Cuéntanos más detalles sobre tu consulta o comentario..."
                                  style="width: 100%; padding: 12px 16px; border: 1px solid #d1d5db; border-radius: 8px; background-color: white; color: #111827; resize: vertical;"></textarea>
                    </div>

                    <!-- Submit Button -->
                    <div>
                        <button type="submit" 
                                style="width: 100%; background-color: #2563eb; color: white; font-weight: 600; padding: 16px 24px; border-radius: 8px; border: none; cursor: pointer; transition: background-color 0.2s;">
                            ✈️ Enviar Mensaje
                        </button>
                    </div>
                </form>
            </div>

            <!-- Contact Information -->
            <div>
                <div style="background-color: white; border-radius: 16px; box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1); padding: 40px; border: 1px solid #e5e7eb;">
                    <h3 style="font-size: 1.875rem; font-weight: bold; color: #111827; margin-bottom: 20px;">
                        Información de contacto
                    </h3>
                    <p style="color: #6b7280; margin-bottom: 30px;">
                        Estamos disponibles para resolver tus dudas y ayudarte en tu búsqueda de empleo o contratación de talento.
                    </p>

                    <!-- Contact Cards -->
                    <div style="display: flex; flex-direction: column; gap: 20px;">
                        <!-- Address -->
                        <div style="display: flex; align-items: flex-start; gap: 16px; padding: 16px; background-color: #f9fafb; border-radius: 12px;">
                            <div style="width: 48px; height: 48px; background-color: #dbeafe; border-radius: 8px; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                📍
                            </div>
                            <div>
                                <h4 style="font-weight: 600; color: #111827; margin-bottom: 4px;">Dirección</h4>
                                <p style="color: #6b7280; margin: 0;">Bogotá D.C, Colombia</p>
                            </div>
                        </div>

                        <!-- Phone -->
                        <div style="display: flex; align-items: flex-start; gap: 16px; padding: 16px; background-color: #f9fafb; border-radius: 12px;">
                            <div style="width: 48px; height: 48px; background-color: #dcfce7; border-radius: 8px; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                📞
                            </div>
                            <div>
                                <h4 style="font-weight: 600; color: #111827; margin-bottom: 4px;">Teléfono</h4>
                                <a href="tel:+57123456789" style="color: #6b7280; text-decoration: none;">
                                    +57 123 456 789
                                </a>
                            </div>
                        </div>

                        <!-- Email -->
                        <div style="display: flex; align-items: flex-start; gap: 16px; padding: 16px; background-color: #f9fafb; border-radius: 12px;">
                            <div style="width: 48px; height: 48px; background-color: #e9d5ff; border-radius: 8px; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                📧
                            </div>
                            <div>
                                <h4 style="font-weight: 600; color: #111827; margin-bottom: 4px;">Correo Electrónico</h4>
                                <a href="mailto:JulioC@jobjuls.com" style="color: #6b7280; text-decoration: none;">
                                    JulioC@jobjuls.com
                                </a>
                            </div>
                        </div>

                        <!-- Hours -->
                        <div style="display: flex; align-items: flex-start; gap: 16px; padding: 16px; background-color: #f9fafb; border-radius: 12px;">
                            <div style="width: 48px; height: 48px; background-color: #fed7aa; border-radius: 8px; display: flex; align-items: center; justify-content: center; flex-shrink: 0;">
                                🕒
                            </div>
                            <div>
                                <h4 style="font-weight: 600; color: #111827; margin-bottom: 4px;">Horario de atención</h4>
                                <div style="color: #6b7280;">
                                    <p style="margin: 0;">Lunes - Viernes: 8:00 AM - 6:00 PM</p>
                                    <p style="margin: 0;">Sábados: 9:00 AM - 1:00 PM</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Social Media -->
                    <div style="margin-top: 30px; padding-top: 20px; border-top: 1px solid #e5e7eb;">
                        <h4 style="font-weight: 600; color: #111827; margin-bottom: 16px;">Síguenos en redes sociales</h4>
                        <div style="display: flex; gap: 12px;">
                            <a href="#" style="width: 40px; height: 40px; background-color: #dbeafe; color: #2563eb; border-radius: 8px; display: flex; align-items: center; justify-content: center; text-decoration: none;">
                                🐦
                            </a>
                            <a href="#" style="width: 40px; height: 40px; background-color: #dbeafe; color: #2563eb; border-radius: 8px; display: flex; align-items: center; justify-content: center; text-decoration: none;">
                                💼
                            </a>
                            <a href="#" style="width: 40px; height: 40px; background-color: #fce7f3; color: #ec4899; border-radius: 8px; display: flex; align-items: center; justify-content: center; text-decoration: none;">
                                📷
                            </a>
                            <a href="#" style="width: 40px; height: 40px; background-color: #f3f4f6; color: #6b7280; border-radius: 8px; display: flex; align-items: center; justify-content: center; text-decoration: none;">
                                🐙
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- FAQ Section -->
<div style="padding: 80px 20px; background-color: white;">
    <div style="max-width: 800px; margin: 0 auto; text-align: center;">
        <div style="background-color: #dbeafe; color: #1e40af; padding: 8px 16px; border-radius: 20px; display: inline-block; margin-bottom: 30px; font-size: 14px; font-weight: 500;">
            ❓ Preguntas frecuentes
        </div>
        
        <h2 style="font-size: 2.5rem; font-weight: bold; color: #111827; margin-bottom: 20px;">
            Respuestas a tus dudas más comunes
        </h2>
        
        <p style="font-size: 1.125rem; color: #6b7280; margin-bottom: 40px;">
            Antes de contactarnos, revisa si tu pregunta ya tiene respuesta en nuestra sección de preguntas frecuentes.
        </p>

        <!-- FAQ Items -->
        <div style="text-align: left; display: flex; flex-direction: column; gap: 16px;">
            
            <!-- FAQ Item 1 -->
            <div style="border: 1px solid #e5e7eb; border-radius: 8px;">
                <div style="padding: 20px; background-color: #f9fafb; border-radius: 8px;">
                    <h3 style="font-size: 1.125rem; font-weight: 500; color: #111827; margin: 0;">
                        ¿Cómo puedo registrarme en la plataforma?
                    </h3>
                </div>
                <div style="padding: 20px; background-color: white;">
                    <p style="color: #6b7280; margin: 0;">
                        El registro es muy sencillo. Solo necesitas hacer clic en "Registrarse" en la parte superior de la página, 
                        completar tus datos básicos y verificar tu correo electrónico. Todo el proceso toma menos de 2 minutos.
                    </p>
                </div>
            </div>

            <!-- FAQ Item 2 -->
            <div style="border: 1px solid #e5e7eb; border-radius: 8px;">
                <div style="padding: 20px; background-color: #f9fafb; border-radius: 8px;">
                    <h3 style="font-size: 1.125rem; font-weight: 500; color: #111827; margin: 0;">
                        ¿Es gratuito usar JobJuls?
                    </h3>
                </div>
                <div style="padding: 20px; background-color: white;">
                    <p style="color: #6b7280; margin: 0;">
                        Sí, JobJuls es completamente gratuito para candidatos. Puedes buscar empleos, aplicar a ofertas y 
                        gestionar tu perfil sin ningún costo. Para empresas, ofrecemos planes flexibles adaptados a sus necesidades.
                    </p>
                </div>
            </div>

            <!-- FAQ Item 3 -->
            <div style="border: 1px solid #e5e7eb; border-radius: 8px;">
                <div style="padding: 20px; background-color: #f9fafb; border-radius: 8px;">
                    <h3 style="font-size: 1.125rem; font-weight: 500; color: #111827; margin: 0;">
                        ¿Qué tipos de empleos puedo encontrar?
                    </h3>
                </div>
                <div style="padding: 20px; background-color: white;">
                    <p style="color: #6b7280; margin: 0;">
                        Tenemos ofertas en todas las industrias: tecnología, marketing, ventas, administración, creatividad, 
                        salud, educación y más. Desde trabajos de tiempo completo hasta freelance y trabajo remoto.
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- CTA Section -->
<div style="padding: 80px 20px; background-color: #2563eb; text-align: center;">
    <div style="max-width: 800px; margin: 0 auto;">
        <h3 style="font-size: 2rem; font-weight: bold; color: white; margin-bottom: 16px;">
            ¿Listo para comenzar tu búsqueda de empleo?
        </h3>
        <p style="color: #93c5fd; margin-bottom: 30px; font-size: 1.125rem;">
            Únete a miles de profesionales y empresas que ya han encontrado su match perfecto en JobJuls.
        </p>
        <div style="display: flex; flex-direction: column; gap: 16px; align-items: center;">
            <a href="{{ route('register') }}" 
               style="display: inline-flex; align-items: center; padding: 12px 24px; background-color: white; color: #2563eb; font-weight: 500; border-radius: 8px; text-decoration: none;">
                👤 Registrarse como Candidato
            </a>
            <a href="{{ route('about') }}" 
               style="display: inline-flex; align-items: center; padding: 12px 24px; border: 2px solid white; color: white; font-weight: 500; border-radius: 8px; text-decoration: none;">
                🏢 Conocer más sobre nosotros
            </a>
        </div>
    </div>
</div>

@endsection