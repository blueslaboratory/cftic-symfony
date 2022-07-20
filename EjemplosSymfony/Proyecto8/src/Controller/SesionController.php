<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SesionController extends AbstractController
{

    // localhost:8000/sesion
    #[Route('/sesion', name: 'sesion')]
    public function sesion(Request $request)
    {
        $session = $request->getSession();

        $session->set('nombre', 'Benito');
        $session->set('apellido', 'Floro');
        $session->set('edad', 22);
        $session->set('altura', 1.85);

        return $this->render('sesion/inicioSesion.html.twig');
    }

    // localhost:8000/verDatosSesion
    #[Route('/verDatosSesion', name: 'verDatosSesion')]
    public function verDatosSesion(Request $request)
    {
        $minombre = $request->getSession()->get('nombre');
        $miapellido = $request->getSession()->get('apellido');

        return $this->render('sesion/verDatos.html.twig', [
            'nombrevariable' => $minombre,
            'apellidovariable' => $miapellido,
        ]);
    }
}
