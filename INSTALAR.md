# Puesta en marcha local

La aplicación Laravel 13 está instalada en esta carpeta. PHP 8.5.12 está en `C:\xampp\php85`; Composer 2.11.2 está en `C:\xampp\tools\composer.bat` y está configurado para usar ese PHP. PHP 8.2 de XAMPP y Apache no fueron reemplazados.

## Preparar MySQL

El proyecto usa una base nueva llamada `webii_laravel`; no apunta a `registro_db`. Crea esa base en tu servidor MySQL y configura en el archivo local `.env` los valores correctos de `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME` y `DB_PASSWORD`. Define también `DOCENTE_EMAIL` y `DOCENTE_CLAVE` para la cuenta docente. No compartas `.env`.

El entorno detectado ya tiene otro servidor ocupando el puerto 3306 y la contraseña no se conoce desde este proyecto. No se ejecutó ninguna migración ni se modificó esa instancia.

## Comandos

Desde esta carpeta:

```powershell
C:\xampp\tools\composer.bat check-platform-reqs
C:\xampp\php85\php.exe artisan key:generate
C:\xampp\php85\php.exe artisan config:clear
C:\xampp\php85\php.exe artisan migrate
C:\xampp\php85\php.exe artisan db:seed --class=DocenteSeeder
C:\xampp\php85\php.exe artisan serve
```

Abre `http://127.0.0.1:8000`. La clave de Laravel ya se generó en el `.env` local. `migrate` crea las tablas del proyecto en `webii_laravel`; no importes registros del sistema anterior ni uses `migrate:fresh`.

## Revisión hecha

PHP 8.5 y sus extensiones requeridas pasan `composer check-platform-reqs`; `php artisan route:list` muestra las diez rutas de la aplicación. Las pruebas de CRUD y acceso siguen pendientes hasta configurar MySQL y realizarlas manualmente. Consulta `README-DEL-PROYECTO.md`.