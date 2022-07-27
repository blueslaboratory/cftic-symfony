<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractController
{
    // 66 - SEGURIDAD INICIO DE SESIÓN

    // http://localhost:8000/register
    // http://localhost:8000/login
    // http://localhost:8000/dashboard
    #[Route('/dashboard', name: 'dashboard')]
    public function dashboard(): Response //response es el objeto que retorna
    {
        // linea de denegar el acceso si no estoy validado
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');

        return $this->render('dashboard/index.html.twig', [
            'controller_name' => 'DashboardController',
        ]);
    }
}
