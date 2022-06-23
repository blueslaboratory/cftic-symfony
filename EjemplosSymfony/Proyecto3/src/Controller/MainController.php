<?php

/*
23/06/2022
localhost:8000/herencia

CTRL D -> selecciona las ocurrencias subrayadas por el raton para despues sustituirlas
*/

// namespace = package
namespace App\Controller;

// use = import
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\Routing\Annotation\Route;


// localhost:8000/herencia
class MainController extends AbstractController
{
    // Anotacion o decoracion, se le suele dar un name para llamarla a traves de otra funcion
    #[Route('/herencia', name: 'vistaH')]

    public function vistaH()
    {
        // $this hace referencia a la instancia de mi propia clase, vete a la funcion render de mi clase (heredada de AbstractController)
        return $this->render('herencia/pagina1.html.twig');
    }
}


