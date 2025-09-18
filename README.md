# Guía de Inicio y Ejecución del Proyecto

Este documento describe los requisitos y los pasos necesarios para instalar, configurar y ejecutar el proyecto de Bolsa de Trabajo en un entorno de desarrollo local.

## 1. Requisitos Previos

Asegúrate de tener instalado el siguiente software en tu sistema:

- **PHP >= 8.1:** El intérprete de PHP. Puedes verificar tu versión con `php -v`.
- **Composer:** El gestor de dependencias para PHP. Puedes verificarlo con `composer --version`.
- **Node.js y npm:** El entorno de ejecución para JavaScript y su gestor de paquetes. Puedes verificar tus versiones con `node -v` y `npm -v`.
- **Un servidor de base de datos:** MySQL.

## 2. Pasos de Instalación

Sigue estos pasos en orden para configurar el proyecto.

### Paso 1: Clonar el Repositorio
Si aún no lo has hecho, clona el proyecto desde su repositorio Git a tu máquina local.
```bash
git clone <URL_DEL_REPOSITORIO>
cd proyecto-bolsajobjuls
```

### Paso 2: Instalar Dependencias de PHP
Usa Composer para instalar todas las librerías y paquetes de PHP necesarios para el proyecto.
```bash
composer install
```

### Paso 3: Instalar Dependencias de JavaScript
Usa npm para instalar las dependencias del frontend, como Vite, Bootstrap y SASS.
```bash
npm install
```

### Paso 4: Configuración del Entorno
El proyecto utiliza un archivo `.env` para gestionar las variables de entorno. Copia el archivo de ejemplo para crear tu propia configuración.
```bash
cp .env.example .env
```

### Paso 5: Generar la Clave de la Aplicación
Laravel requiere una clave de aplicación única, que se utiliza para el cifrado. Genérala con el siguiente comando de Artisan:
```bash
php artisan key:generate
```

### Paso 6: Configurar la Base de Datos
Abre el archivo `.env` que creaste en el paso 4 y edita las siguientes variables para que coincidan con la configuración de tu servidor de base de datos local.

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nombre_de_tu_base_de_datos
DB_USERNAME=tu_usuario_de_bd
DB_PASSWORD=tu_contraseña_de_bd
```
**Importante:** Asegúrate de que la base de datos (`nombre_de_tu_base_de_datos`) ya exista en tu gestor de bases de datos.

### Paso 7: Ejecutar las Migraciones
Una vez configurada la conexión, ejecuta las migraciones para crear todas las tablas necesarias en tu base de datos.
```bash
php artisan migrate
```

## 3. Ejecución del Proyecto

Para ejecutar la aplicación en modo de desarrollo, necesitas iniciar dos procesos en dos terminales separadas.

### Terminal 1: Iniciar el Servidor de Vite
Este proceso compilará los assets del frontend (CSS, JS) y los mantendrá actualizados automáticamente cada vez que hagas un cambio.
```bash
npm run dev
```

### Terminal 2: Iniciar el Servidor de Laravel
Este comando iniciará el servidor de desarrollo de Laravel, que servirá la aplicación.
```bash
php artisan serve
```

### Acceso a la Aplicación
Una vez que ambos procesos estén en ejecución, podrás acceder a la aplicación en tu navegador web a través de la URL que se muestra en la terminal de `php artisan serve`, que generalmente es:

**http://127.0.0.1:8000**
