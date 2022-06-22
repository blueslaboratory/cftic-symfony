<?php

/*
22/06/2022
localhost:8000/lenguajes

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
    // Anotacion o decoracion, se le suele dar un name para llamarla a traves de otra funcion
    #[Route('/lenguajes', name: 'vistaPrincipal')]

    public function vistaPrincipal()
    {
        // $this hace referencia a la instancia de mi propia clase, vete a la funcion render de mi clase (heredada de AbstractController)
        return $this->render('inicio.html.twig');
    }


    #[Route('/java', name: 'java')]
    public function vistaJava()
    {
        return $this->render('lenguajes/java.html.twig');
    }

    #[Route('/php', name: 'php')]
    public function vistaPHP()
    {
        return $this->render('lenguajes/php.html.twig');
    }

    #[Route('/python', name: 'python')]
    public function vistaPython()
    {
        return $this->render('lenguajes/python.html.twig');
    }

    #[Route('/thanks', name: 'thanks')]
    public function vistaThankYou()
    {
        return $this->render('thanks.html.twig');
    }
}
