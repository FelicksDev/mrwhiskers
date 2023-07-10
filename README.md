
<h1 align="center"> APLICACION WEB PARA SISTEMA DE RESERVAS EN VETERINARIA <br><strong>MR. WHISKERS</strong></h1>

<div align="center">
 <img alt="Lenguajes" src="https://img.shields.io/github/languages/count/FelicksDev/mrwhiskers">
<img alt="Tamaño de respositorio" src="https://img.shields.io/github/repo-size/FelicksDev/mrwhiskers">
<img alt="licencia" src="https://img.shields.io/github/license/WelissonLuca/ecommerce-api?style=plastic">
<a href="https://github.com/FelicksDev/mrwhiskers">
    <img alt="GitHub last commit" src="https://img.shields.io/github/last-commit/FelicksDev/mrwhiskers/main">
  </a>

</div>
<!-- Description -->

## Descripción

El proyecto "Sistema de Reserva de Citas" es una aplicación diseñada para la Clínica Veterinaria "Mr. Whiskers". El objetivo principal de la aplicación es gestionar las reservas de citas de los clientes y facilitar el proceso de programación de citas para los clientes de la clínica. 

<!-- technologies -->
## Tecnologias
- **[MySql](https://www.mysql.com/)**
- **[Laravel](https://laravel.com/)**
- **[FullCalendar](https://fullcalendar.io/)**
<!-- Instalation -->

## Instalación

A continuación, se detallan los pasos necesarios para instalar y configurar el proyecto en un entorno local:

Clonar el repositorio desde GitHub:

``` 
git clone <https://github.com/FelicksDev/mrwhiskers.git>
``` 
Instalar las dependencias del proyecto mediante Composer:

``` php
composer install
``` 
Copiar el archivo de configuración de entorno de ejemplo y configurar las variables de entorno:
``` 
cp .env.example .env
```
Luego, editar el archivo .env con la configuración adecuada para la base de datos y otros ajustes necesarios.

Generar una clave de aplicación:
``` php
php artisan key:generate
``` 
Ejecutar las migraciones y los sembradores para crear las tablas y generar los datos en la base de datos:
``` php
php artisan migrate --seed
``` 
Iniciar el servidor de desarrollo:
``` php
php artisan serve
``` 
El proyecto estará alojado en http://localhost:8000/inicio.
<!-- Demo credentials --->

## Credenciales de acceso a demostracion local
**Client user** <br>
user: admin <br>
pass: admin

**Admin user** <br>
user. Antonio <br>
pass. 123
<!--- License--->
## Licencia

El proyecto se distribuye bajo la licencia MIT. Para obtener más información, consulte el archivo **LICENSE** en el repositorio del proyecto.

<strong>Autor(es):</strong> <br>
|[<img src="https://avatars.githubusercontent.com/u/101672631?v=4" width=115> <br><small>@FelicksDev</small>](https://github.com/FelicksDev)|
| :---------------------------------------------------------------------------------------------------------------------------------: |