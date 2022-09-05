<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

// 72 - CREACIÓN WEB API CON SYMFONY
// PS C:\xampp\htdocs\CFTIC\EjemplosSymfony\Proyecto11> php -S localhost:8000 -t public/
// hay que tener corriendo el Proyecto 11 a la vez que el 12

class PresentadoresServerController extends AbstractController
{

    // http://localhost:8000/lecturaget
    #[Route('/lecturaget', name: 'inicio')]
    public function inicio()
    {
        $datos = [
            [
                'nombre' => 'Benito',
                'apellido' => 'Floro'
            ],
            [
                'nombre' => 'Maria',
                'apellido' => 'Patiño'
            ],
            [
                'nombre' => 'Carlos',
                'apellido' => 'Lozano'
            ],
            [
                'nombre' => 'Kiko',
                'apellido' => 'Matamoros'
            ],
            [
                'nombre' => 'Rafa',
                'apellido' => 'Mora'
            ],
            [
                'nombre' => 'Kiko',
                'apellido' => 'Matamoros'
            ],
            [
                'nombre' => 'Alonso',
                'apellido' => 'Caparros'
            ],
            [
                'nombre' => 'Isa',
                'apellido' => 'Pantoja'
            ],
        ];

        return new JsonResponse($datos);
    }


    // http://localhost:8000/lecturaget/0
    // http://localhost:8000/lecturaget/4
    #[Route('/lecturaget/{id}', name: 'inicio2')]
    public function inicio2($id)
    {
        $datos = [
            [
                'nombre' => 'Benito',
                'apellido' => 'Floro'
            ],
            [
                'nombre' => 'Maria',
                'apellido' => 'Patiño'
            ],
            [
                'nombre' => 'Carlos',
                'apellido' => 'Lozano'
            ],
            [
                'nombre' => 'Kiko',
                'apellido' => 'Matamoros'
            ],
            [
                'nombre' => 'Rafa',
                'apellido' => 'Mora'
            ],
            [
                'nombre' => 'Kiko',
                'apellido' => 'Matamoros'
            ],
            [
                'nombre' => 'Alonso',
                'apellido' => 'Caparros'
            ],
            [
                'nombre' => 'Isa',
                'apellido' => 'Pantoja'
            ],
        ];

        return new JsonResponse($datos[$id]);
    }
}
