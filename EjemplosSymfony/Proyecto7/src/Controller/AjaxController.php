<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AjaxController extends AbstractController
{
    // 55 - CARGAR VISTAS PARCIALES CON JQUERY AJAX
    // + recursos para JQUERY: E:\CFTIC - Symfony\EXTRA\FRAMEWORK\JQUERY
    // localhost:8000/indexAjax
    #[Route('/indexAjax', name: 'indexAjax')]
    public function inicio()
    {
        return $this->render('ajax/indexAjax.html.twig');
    }

    // localhost:8000/personasAjax
    #[Route('/personasAjax', name: 'RecuperarPersonas')]
    public function personas()
    {
        $objpersonas = [
            [
                'nombre' => 'Benito',
                'apellido' => 'Floro'
            ],
            [
                'nombre' => 'Andrea',
                'apellido' => 'Galindo'
            ],
            [
                'nombre' => 'Thor',
                'apellido' => 'Ramiro'
            ],
            [
                'nombre' => 'Alex',
                'apellido' => 'Galindo'
            ],
        ];

        return $this->render('ajax/personas.html.twig', [
            'mispersonas' => $objpersonas
        ]);
    }

    // localhost:8000/lenguajes
    #[Route('/lenguajes', name: 'RecuperarLenguajes')]
    public function lenguajes()
    {
        $objlenguajes = [
            [
                'nombre' => 'Symfony',
                'tipo' => 'Programación'
            ],
            [
                'nombre' => 'SQL Server',
                'tipo' => 'Base de datos'
            ],
            [
                'nombre' => 'C#',
                'tipo' => 'Programación'
            ],
            [
                'nombre' => 'Java',
                'tipo' => 'Programación'
            ],
        ];

        return $this->render('ajax/lenguajes.html.twig', [
            'mislenguajes' => $objlenguajes
        ]);
    }


}
