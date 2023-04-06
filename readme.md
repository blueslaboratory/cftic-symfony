# 1. Centro de Formación en Tecnologías de la Información y las Comunicaciones - Curso de Symfony 2022

<a href="https://github.com/blueslaboratory/cftic-symfony/pulls"><img src="https://img.shields.io/badge/Pull%20Request-Edit-green"></a>&nbsp;<a href="https://github.com/blueslaboratory/cftic-symfony/commits/master"><img src="https://img.shields.io/github/last-commit/blueslaboratory/cftic-symfony"></a>

# 2. Introducción

En este curso se han realizado diversos proyectos y ejemplos con el objetivo de conocer el funcionamiento del framework **[Symfony](https://symfony.com/)** de tipo Modelo-Vista-Controlador (**[MVC](https://es.wikipedia.org/wiki/Modelo%E2%80%93vista%E2%80%93controlador)**). El curso culmina con la realización de un proyecto por parte del alumno, en este caso el Proyecto Waydo.
En este repositorio se encuentran los distintos ejemplos y proyectos vistos a lo largo del curso.
URL del curso: **[SYMFONY (FRAMEWORK PARA PHP)](https://cftic.centrosdeformacion.empleo.madrid.org/cursos-2020-21/symfony-framework-para-php-)** 
URL Centro de Referencia Nacional de Desarrollo Informático y Comunicaciones: (**[CFTIC](https://cftic.centrosdeformacion.empleo.madrid.org/)**) 
Empresa responsable de la docencia: **[CAS Training](https://cas-training.com/)**.

# 3. Objetivos

- Desarrollar aplicaciones web utilizando el framework de PHP Symfony.
- Crear un proyecto web de principio a fin utilizando Symfony: proyecto Waydo. El comienzo del proyecto Waydo se remonta al hackaton retods y tiene como objetivo realizar una implementación inicial del proyecto allí propuesto, que consiste en un emprendimiento social para que las personas reconecten con su barrio y sus gentes a través de actividades, rankings y torneos. Se ha decidido comenzar con la propuesta de actividades en los distintos municipios del distrito Madrid.

# 4. Herramientas y tecnologías utilizadas a lo largo del curso:

- Ejecutar código PHP en local: **[XAMPP (servidor Apache + MariaDB + PHP + Perl)](https://www.apachefriends.org)**.
- IDE de desarrollo: **[Visual Studio Code](https://code.visualstudio.com/)** y como mínimo se instalan los siguientes plugins:
    - **[PHP Extension Pack](https://marketplace.visualstudio.com/items?itemName=xdebug.php-pack)**.
    - **[PHP Server](https://marketplace.visualstudio.com/items?itemName=brapifra.phpserver)**.
- Instalación y configuración de Symfony: **[Composer](https://getcomposer.org)**.
- Instalación y configuración de la base de datos: **[Doctrine](https://www.doctrine-project.org/)**.
- Front-end: **[CSS](https://es.wikipedia.org/wiki/CSS)**, **[JavaScript](https://es.wikipedia.org/wiki/JavaScript)**, **[Bootstrap](https://getbootstrap.com/)** y **[jQuery](https://jquery.com/)**. 
- Control de cambios en local: **[Git](https://git-scm.com/)** 
- Gestión del proyecto online en los repositorios de **[Github](https://github.com/)**.
- Despliegue en la **[nube de tipo PaaS](https://en.wikipedia.org/wiki/Platform_as_a_service)** a través de **[Platform.sh](https://platform.sh/)**. (opcional) 
- Desarrollo de APIs: **[.NET](https://docs.microsoft.com/es-es/dotnet/)** para su despliegue en la nube de Microsoft, **[Azure](https://azure.microsoft.com/es-es/resources/cloud-computing-dictionary/what-is-azure/)** y su consumo en formato **[.JSON](https://es.wikipedia.org/wiki/JSON)**.

# 5. Pasos de instalación/configuración en local

1. Instalaciones:
    - **[PHP 8.1](https://windows.php.net/download#php-8.1)**
    - **[Composer](https://getcomposer.org/download/)**
    - **[XAMPP](https://www.apachefriends.org/download.html)**
    - **[Visual Studio Code](https://code.visualstudio.com/download)**
    - **[Git](https://git-scm.com/downloads)**

2. Crear un proyecto de Symfony y añadir las siguientes librerías como mínimo (repositorio controlado en local junto con Github y Gitlab):
~~~
$ composer create-project symfony/website-skeleton"6.1.*" nombre_del_proyecto
$ cd nombre_del_proyecto
$ composer require webapp
$ composer require symfony/orm-pack
$ composer require --dev symfony/maker-bundle
~~~ 

3. Comprobación del proyecto creado
~~~
$ php bin/console about
~~~ 

4. Ejecución del proyecto en local (por ejemplo en el puerto 8000)
~~~
$ php -S localhost:8000 -t public/
~~~ 

En el navegador: 
~~~
http://localhost:8000/
~~~

# 6. Pasos de instalación/configuración (despliegue en la nube) (opcional)

1. Abrir una cuenta en Platform.sh y crear un proyecto nuevo en la región deseada (por ejemplo en la **[nube de Amazon](https://aws.amazon.com/es/free/?trk=2d5aad89-991b-4184-98b5-1f562e3102c8&sc_channel=ps&sc_campaign=acquisition&sc_medium=ACQ-P|PS-GO|Brand|Desktop|SU|Core-Main|Core|ES|ES|Text&ef_id=CjwKCAjw5s6WBhA4EiwACGncZfDpAMhHdboXzqD3gXOs215IILOGx0x_imdbdyFSIGLwngdve3OvYhoCzPoQAvD_BwE:G:s&s_kwcid=AL!4422!3!561218200770!e!!g!!aws&ef_id=CjwKCAjw5s6WBhA4EiwACGncZfDpAMhHdboXzqD3gXOs215IILOGx0x_imdbdyFSIGLwngdve3OvYhoCzPoQAvD_BwE:G:s&s_kwcid=AL!4422!3!561218200770!e!!g!!aws&all-free-tier.sort-by=item.additionalFields.SortRank&all-free-tier.sort-order=asc&awsf.Free%20Tier%20Types=*all&awsf.Free%20Tier%20Categories=*all)** -> Europe - Sweden eu-5 - AWS) 

2. Clonarlo en local
~~~
$ git clone ...@....git nombre_del_proyecto_creado
~~~

3. Trasladar los ficheros creados en el paso 2. del punto anterior (5.) a la carpeta del repositorio clonado en el paso anterior

También hay que añadir 3 ficheros de configuración para el despliegue:

- **[.platform.app.yaml](https://github.com/blueslaboratory/cftic-symfony/blob/master/ProyectoWaydo/waydo/.platform.app.yaml)**
    - Documentación: **[https://docs.platform.sh/create-apps.html](https://docs.platform.sh/create-apps.html)**
- **[~/.platform/routes.yaml](https://github.com/blueslaboratory/cftic-symfony/blob/master/ProyectoWaydo/waydo/.platform/routes.yaml)**
    - Documentación: **[https://docs.platform.sh/define-routes.html](https://docs.platform.sh/define-routes.html)**	
- **[~/.platform/services.yaml](https://github.com/blueslaboratory/cftic-symfony/blob/master/ProyectoWaydo/waydo/.platform/services.yaml)**
    - Documentación: **[https://docs.platform.sh/add-services.html](https://docs.platform.sh/add-services.html)**

4. **[Añadir la primera página con su vista y controlador](https://symfony.com/doc/current/page_creation.html#creating-a-page-route-and-controller)**
~~~
$ php bin/console make:controller nombre_del_controladorController
~~~

- **Ruta de la vista:** ~/templates/nombre_de_la_vista.html.twig
- **Ruta del controlador:** ~/src/Controller/nombre_del_controladorController.php

5. Despliegue a la nube
~~~
$ git add .
$ git commit -m "descripción del commit"
$ git push origin master
~~~

# 6 .Principales ficheros editables

- ~/.platform/*
- ~/public/*
- ~/src/Controller/*
- ~/src/Entity/*
- ~/src/Repository/*
- ~/templates/*
- ~/translations/*
- ~/.env
- ~/.platform.app.yaml

# 7. Documentación

## Symfony

- Documentación:
    - **[https://symfony.com/doc/current/index.html](https://symfony.com/doc/current/index.html)**.
- Demo en Github
    - **[https://github.com/symfony/demo](https://github.com/symfony/demo)**.

## PHP

- Documentación:
    - **[https://www.php.net/manual/es/](https://www.php.net/manual/es/)**.
- GitHub:
    - **[https://github.com/php/?q=doc](https://github.com/php/?q=doc)**.

## XAMPP (Apache Friends)

- GitHub:
    - **[https://github.com/ApacheFriends](https://github.com/ApacheFriends)**.

## Visual Studio Code

- Documentación:
    - **[https://code.visualstudio.com/docs](https://code.visualstudio.com/docs)**.

## Composer

- Documentación:
    - **[https://getcomposer.org/doc/](https://getcomposer.org/doc/)**.
- GitHub:
    - **[https://github.com/composer/composer](https://github.com/composer/composer)**.

## Bootstrap

- Documentación:
    - **[https://getbootstrap.com/docs/5.1/getting-started/introduction/](https://getbootstrap.com/docs/5.1/getting-started/introduction/)**.

## jQuery

- Documentación:
    - **[https://api.jquery.com/](https://api.jquery.com/)**.
- GitHub:
    - **[https://github.com/jquery/jquery](https://github.com/jquery/jquery)**.

## Doctrine

- Documentación:
    - **[https://www.doctrine-project.org/projects/doctrine-orm/en/2.11/index.html](https://www.doctrine-project.org/projects/doctrine-orm/en/2.11/index.html)**.
- GitHub:
    - **[https://github.com/doctrine](https://github.com/doctrine)**.

# 8. Referencias

## ReadMe
- **[ReadME](https://github.com/antoniojturel/motocampeonas/blob/main/README.md)**

## Datos
- **[Hackathon retODS](https://fpinnovacion.com/hackathon/)**

## Diseño
- **[w3school](https://www.w3schools.com/)**