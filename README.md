<a id="readme-top"></a>
[![ByteNexSolutions](https://img.shields.io/badge/ByteNexSolutions-Dynalog-yellow)](https://github.com/ByteNexSolutions/ByteNexSolutions-Dynalog)  
[![Packagist](https://img.shields.io/packagist/v/bytenexsolutions/dynalog.svg?label=Packagist%20version)](https://packagist.org/packages/bytenexsolutions/dynalog)
[![License: MIT](https://img.shields.io/badge/License-MIT-red.svg)](LICENSE)
[![Author](https://img.shields.io/badge/dynamic/json?url=https://raw.githubusercontent.com/ByteNexSolutions/ByteNexSolutions-Dynalog/main/composer.json&query=$.authors[0].name&label=Author&color=green)](https://github.com/rchapon) 







<!-- Improved compatibility of back to top link: See: https://github.com/othneildrew/Best-README-Template/pull/73 -->

<!--
*** Thanks for checking out the Best-README-Template. If you have a suggestion
*** that would make this better, please fork the repo and create a pull request
*** or simply open an issue with the tag "enhancement".
*** Don't forget to give the project a star!
*** Thanks again! Now go create something AMAZING! :D
-->



<!-- PROJECT SHIELDS -->
<!--
*** I'm using markdown "reference style" links for readability.
*** Reference links are enclosed in brackets [ ] instead of parentheses ( ).
*** See the bottom of this document for the declaration of the reference variables
*** for contributors-url, forks-url, etc. This is an optional, concise syntax you may use.
*** https://www.markdownguide.org/basic-syntax/#reference-style-links
-->

# ByteNexSolutions DynaLog (bytenexsolutions-dynalog)

<!-- TABLE OF CONTENTS -->
<details>
  <summary>Table of Contents / Tabla de contenidos</summary>
  <ol>
    <li>
      <a href="#about-the-project">About the package / Acerca del paquete </a>
      <ul>
        <li><a href="#built-with">Built to / Construido para</a></li>
      </ul>
    </li>
    <li>
      <a href="#getting-started">Getting Started / Primeros pasos</a>
      <ul>
        <li><a href="#prerequisites">Prerequisites / Pre requisitos</a></li>
        <li><a href="#installation">Installation / Instalación</a></li>
      </ul>
    </li>
    <li><a href="#usage">Usage / Uso</a></li>
    <!--<li><a href="#roadmap">Roadmap</a></li>-->
    <li><a href="#contributing">Contributing / Contribuyendo</a></li>
    <li><a href="#license">License / Licencia</a></li>
    <li><a href="#contact">Contact / Contacto</a></li>
    <li><a href="#acknowledgments">Acknowledgments / Agradecimientos</a></li>
  </ol>
</details>

<!-- ABOUT THE PROJECT -->
## About the package / Acerca del paquete

__Dynalog__ is a solutions to make Laravel logs channels dynamicaly, without declare on logging config file.

__Dynalog__ es una solución para crear canales de logs en Laravel de forma dinámica, sin declaraciones en el archivo de 
configuracíon del logging.

<p align="right">(<a href="#readme-top">back to top</a>)</p>

### Built to / Construido para
* [![Laravel][Laravel.com]][Laravel-url]

<p align="right">(<a href="#readme-top">back to top</a>)</p>

<!-- GETTING STARTED -->
## Getting Started / Primeros pasos

You do not need to publish any configuration files.
__DynaLog__ creates dynamic log channels organized by category and source (category / source).

No es necesario publicar ningún archivo de configuración.
__DynaLog__ crea canales de registros (logs) dinámicos organizados por categoría y fuente (category / source).

__Automatically generated structure / Estructura generada automáticamente:__

```bash
storage/logs/{category}/{source}/YYYY-MM-DD.log
```
__Example / Ejemplo__

```bash
storage/logs/Payments/Stripe/2025-09-08.log
```

__Example of logs structure / Ejemplo de estructura de registros (logs)__

```bash
storage/logs/
 └── Payments/
     └── Stripe/
         ├── 2025-09-07.log
         └── 2025-09-08.log
 └── Users/
     └── Auth/
         └── 2025-09-08.log
 └── Notifications/
     └── Twilio/
         └── 2025-09-08.log
```

### Prerequisites / Pre requisitos

Require / Requiere **PHP >= 8.0.2** y **Laravel 9+**.

### Instalation / Instalación

```bash
composer require bytenexsolutions/dynalog
```

<p align="right">(<a href="#readme-top">back to top</a>)</p>

<!-- USAGE EXAMPLES -->
## Usage / Uso

You can use the __DynaLog__ facade to create a dynamic logger and log messages.

Puedes usar el facade __DynaLog__ para crear un logger dinámico y registrar mensajes.

__Example / Ejemplo__

```bash
// Import DynaLog / Importar Dynalog
use ByteNexSolutions\DynaLog\Facades\DynaLog;

// Create a logger for the "Payments" category and "Stripe" source / Crear un logger para la categoría "Payments" y fuente "Stripe"
$logger = DynaLog::make('Payments', 'Stripe');
```
```bash 
or without Import / o sin importarlo
$logger = \DynaLog::make('Payments', 'Stripe');
```

```bash
// Record different log levels / Registrar diferentes niveles de log
$logger->info('Payment process started', ['user_id' => 123]);
$logger->debug('Payload received', ['payload' => $payload]);
$logger->warning('Payment delayed response');
$logger->error('Payment failed', ['error_code' => 'TIMEOUT']);
$logger->critical('Stripe API unreachable');
```
You can also call static methods of the facade directly. 

También puedes llamar directamente a los métodos estáticos de la facade.

__Example / Ejemplo__

```bash
DynaLog::make('Users', 'Auth')->info('User login success', ['id' => 321]);
```

By default __DynaLog__ use "storage_path('logs')" and default days as 7. If you want to change please publish dynalog config file.

Por defecto, __DynaLog__ utiliza «storage_path(“logs”)» y el número de días predeterminado es 7. Si desea cambiarlo, publique el archivo de configuración de DynaLog.

__Publish / Publicar__

```bash
php artisan vendor:publish --tag=dynalog-config
```

<p align="right">(<a href="#readme-top">back to top</a>)</p>

<!-- ROADMAP 
## Roadmap

- [x] Add Changelog
- [x] Add back to top links
- [ ] Add Additional Templates w/ Examples
- [ ] Add "components" document to easily copy & paste sections of the readme
- [ ] Multi-language Support
    - [ ] Chinese
    - [ ] Spanish

See the [open issues](https://github.com/othneildrew/Best-README-Template/issues) for a full list of proposed features (and known issues).

<p align="right">(<a href="#readme-top">back to top</a>)</p>-->




<!-- ACKNOWLEDGMENTS -->
## Acknowledgments / Agradecimientos

* [Best-Readme-Template](https://github.com/othneildrew/Best-README-Template)
* [Shields.io](https://shields.io/badges)

<p align="right">(<a href="#readme-top">back to top</a>)</p>



<!-- MARKDOWN LINKS & IMAGES -->
<!-- https://www.markdownguide.org/basic-syntax/#reference-style-links -->
[Laravel.com]: https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white
[Laravel-url]: https://laravel.com