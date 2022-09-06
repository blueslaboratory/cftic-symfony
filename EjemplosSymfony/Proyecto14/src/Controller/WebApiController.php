<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

// 06/09/2022
// PS C:\xampp\htdocs\CFTIC\EjemplosSymfony\Proyecto14> php -S localhost:8000 -t public/

class WebApiController extends AbstractController
{
    // http://localhost:8000/apiazure/
    #[Route('/apiazure', name: 'apiazure')]
    public function apiazure(Request $request)
    {
        // si cambias la ciudad en file_get_contents cambia
        $datos = file_get_contents("https://proyectowebapi1.azurewebsites.net/api/values/ciudad/Madrid");
        dump($datos);

        return $this->render('apiAzure/apiAzure.html.twig', [
            'datos' => $datos
        ]);
    }
}