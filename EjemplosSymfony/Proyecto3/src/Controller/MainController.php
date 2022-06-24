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


class MainController extends AbstractController
{
    // localhost:8000/herencia
    // Anotacion o decoracion, se le suele dar un name para llamarla a traves de otra funcion
    #[Route('/herencia', name: 'vistaH')]

    public function vistaH()
    {
        // $this hace referencia a la instancia de mi propia clase, vete a la funcion render de mi clase (heredada de AbstractController)
        return $this->render('herencia/pagina1.html.twig');
    }

    //24/06/2022
    // localhost:8000/herencia1
    #[Route('/herencia1', name: 'vistaPlantillas')]
    public function vistaPlantillas()
    {
        return $this->render('plantillas/baseAdmin.html.twig');
    }


    //VINOS
    // localhost:8000/vinosRibera
    #[Route('/vinosRibera', name: 'vistaMasterVinos')]
    public function vistaVinos()
    {
        return $this->render('vinos/masterVinos.html.twig');
    }

    #[Route('/protos', name: 'vistaProtos')]
    public function vistaProtos()
    {
        return $this->render('vinos/protos.html.twig');
    }

    #[Route('/vegaSicilia', name: 'vistavegaSicilia')]
    public function vistaVegaSicilia()
    {
        return $this->render('vinos/vegaSicilia.html.twig');
    }

    #[Route('/arzuaga', name: 'vistaArzuaga')]
    public function vistaArzuaga()
    {
        return $this->render('vinos/arzuaga.html.twig');
    }

    #[Route('/pradoRey', name: 'vistaPradoRey')]
    public function vistaPradoRey()
    {
        return $this->render('vinos/pradoRey.html.twig');
    }
}

