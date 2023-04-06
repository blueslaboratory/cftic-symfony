<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

// 72 - CREACIÓN WEB API CON SYMFONY
// PS C:\xampp\htdocs\CFTIC\EjemplosSymfony\Proyecto12> php -S localhost:8004 -t public/
// hay que tener corriendo el Proyecto 11 a la vez que el 12

class PresentadoresClienteController extends AbstractController
{
    // http://localhost:8004/consumoapi
    #[Route('/consumoapi', name: 'inicio')]
    public function consumoapi(Request $request)
    {
        $datos = file_get_contents("http://localhost:8000/lecturaget");
        //aqui podria ir una ip
        $cotilleo = json_decode($datos, true);

        return $this->render('ConsumoPresentadores/presentadores.html.twig', [
            'datosPrograma' => $cotilleo,
        ]);
    }

    // http://localhost:8004/consumoapi/0
    #[Route('/consumoapi/{id}', name: 'consumoapi')]
    public function inicio1(Request $request, $id) //$id recibe el dato que le pasas en la ruta
    {
        $datos = file_get_contents("http://localhost:8000/lecturaget/". $id);
        dump($datos);
        $cotilleo = json_decode($datos, true);
        dump($cotilleo);

        return $this->render('ConsumoPresentadores/presentadores1.html.twig', [
            'datosPrograma' => $cotilleo,
        ]);
    }
}
