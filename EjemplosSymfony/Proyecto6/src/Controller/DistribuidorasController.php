<?php

namespace App\Controller;

use App\Entity\Distribuidoras;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;

class DistribuidorasController extends AbstractController
{

    // localhost:8000/verdistribuidoras
    #[Route('/verdistribuidoras', name: 'verdistribuidoras')]
    public function verdistribuidoras(EntityManagerInterface $em)
    {
        //array de todos los datos repositorio (tabla) 
        $datos = $em->getRepository(Distribuidoras::class)->findAll();
        //dump hace que podamos ver el dato que enviamos en la vista de visual studio
        dump($datos);

        //enviamos a la vista array con datos de toda la tabla (findAll)
        return $this->render('distribuidoras/index.html.twig', [
            //nombre de parámetro => valor 
            'datosDistribuidoras' => $datos
        ]);
    }
}