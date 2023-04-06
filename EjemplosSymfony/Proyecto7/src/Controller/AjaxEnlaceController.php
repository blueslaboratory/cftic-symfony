<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AjaxEnlaceController extends AbstractController
{

    //57 - AJAX CON ENLACE
    // localhost:8000/indexAjaxEnlace
    #[Route('/indexAjaxEnlace', name: 'indexAjaxEnlace')]
    public function indexAjaxEnlace()
    {
        return $this->render('ajaxEnlace/indexAjaxEnlace.html.twig');
    }

    // localhost:8000/recuperarAjaxGet
    #[Route('/recuperarAjaxGet', name: 'recuperarAjaxGet')]
    public function recuperarAjaxGet(Request $request)
    {
        $datoget = $request->query->get('id');
        $datoget2 = $request->query->get('nombre');

        return $this->render('ajaxEnlace/verdatos.html.twig', [
            'a' => $datoget,
            'b' => $datoget2
        ]);
    }
}
