# Proyecto Laravel JetStream Artículos

Este es un proyecto desarrollado con Laravel y JetStream para gestionar artículos. Sigue las instrucciones a continuación para clonar, instalar y ejecutar el proyecto en tu entorno local.

## Clonar el repositorio

Para clonar este repositorio, utiliza el siguiente comando en tu terminal:

```bash
git clone https://github.com/desther2207/Proyecto-laravel-jetStream-Articulos-1-N.git
```
## Accede al directorio del proyecto:

```bash
cd Proyecto-laravel-jetStream-Articulos-1-N
```
## Requisitos previos
Asegúrate de tener instalados los siguientes programas en tu máquina:

* PHP (versión 8.0 o superior)
* Composer
* Node.js
* Laravel
* MySQL o cualquier base de datos compatible con Laravel.
  
## Instalación
Instala las dependencias de PHP con Composer:

En la raíz del proyecto, ejecuta el siguiente comando:

```bash
composer install
```
## Instala las dependencias de JavaScript con NPM:

Si tu proyecto usa algún paquete frontend (como Tailwind, Alpine.js, etc.), instala las dependencias de JavaScript:

```bash
npm install
```
## Configura el archivo .env:

Copia el archivo .env.example y renómbralo a .env:

```bash
cp .env.example .env
```
Luego, abre el archivo .env y ajusta las configuraciones de la base de datos y otras variables de entorno según tu configuración local.

## Genera la clave de aplicación de Laravel:

Ejecuta el siguiente comando para generar la clave de la aplicación:

```bash
php artisan key:generate
```
## Migraciones de base de datos:

Si el proyecto tiene migraciones de base de datos, ejecuta las migraciones con el siguiente comando:

```bash
php artisan migrate
```
## Ejecución
Para iniciar el servidor de desarrollo de Laravel, ejecuta:

```bash
php artisan serve
```
El servidor estará disponible en http://localhost:8000.
