<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactoController extends AbstractController
{
    // localhost:8000/contacto
    #[Route('/contacto', name: 'contacto')]
    public function contacto(): Response
    {
        return $this->render('contacto/contacto.html.twig', [
        ]);
    }
}