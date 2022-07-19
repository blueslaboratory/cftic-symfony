<?php

namespace App\Controller;

use App\Entity\Localizacion;

use Doctrine\ORM\EntityManagerInterface;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ActividadesController extends AbstractController
{
    // localhost:8000/actividades
    #[Route('/actividades', name: 'actividades')]
    public function actividades(): Response
    {
        return $this->render('actividades/actividades.html.twig', [
        ]);
    }

    // localhost:8000/actividadesFlipBox
    #[Route('/actividadesFlipBox', name: 'actividadesFlipBox')]
    public function actividadesFlipBox(EntityManagerInterface $em): Response
    {
        $municipio = 'MADRID';
        $query = $em->createQuery('SELECT DISTINCT(l.distrito) AS distrito FROM App\Entity\Localizacion l 
                                   WHERE l.municipio = :m ORDER BY distrito ASC');
        $query->setParameter('m', $municipio);
        $datos = $query->getResult();

        // var_dump($datos);

        return $this->render('actividades/actividadesFlipBox.html.twig', [
            'distritos' => $datos
        ]);
    }
}