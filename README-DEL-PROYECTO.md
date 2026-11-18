# Registro académico AUNAR

Aplicación web educativa para administrar registros de estudiantes. Está construida con Laravel 13, PHP 8.3+ y MySQL/MariaDB.

## Funciones

- Acceso docente con Laravel Auth.
- Crear, editar y eliminar estudiantes con confirmación.
- Validación de nombre, correo único, edad (16 a 100) y programa.
- Búsqueda por nombre y listado paginado.

## Requisitos

- PHP 8.3 o superior con `pdo_mysql`, `mbstring`, `openssl`, `fileinfo` y `zip`.
- Composer 2.
- MySQL o MariaDB.

## Instalación local

1. Crea una base de datos vacía llamada `webii_laravel`.
2. Copia `.env.example` a `.env` y configura los valores `DB_*` si tu servidor usa otros datos.
3. Instala y prepara la aplicación:

```sh
composer install
php artisan key:generate
php artisan config:clear
php artisan migrate
php artisan db:seed --class=DocenteSeeder
php artisan serve
```

4. Abre `http://127.0.0.1:8000/login`.

### Cuenta pública de demostración

- Correo: `demo@aunar.local`
- Contraseña: `AunarDemo2026!`

Estas credenciales se incluyen para la demostración académica en una copia local. No las uses en un sitio público con datos reales. Al clonar el repositorio, copia `.env.example` a `.env` y ejecuta el seeder para crear la cuenta demo.

## Estructura MVC

- `routes/web.php`: rutas y protección `auth`.
- `app/Http/Controllers`: validación, sesión y operaciones CRUD.
- `app/Models/Estudiante.php`: modelo Eloquent.
- `resources/views`: pantallas Blade.
- `database/migrations`: tablas `users`, caché, colas y estudiantes.
- `config/programas.php`: catálogo de programas.

La tabla `users` gestiona el acceso; la tabla `estudiantes` almacena los registros académicos.

## Seguridad y publicación

`.env` contiene claves locales y está excluido de Git. No publiques contraseñas personales ni una base de datos con información real. Este repositorio contiene el código; para tener una URL pública hace falta desplegar la app en un servicio de hosting y configurar allí sus secretos y su base de datos.