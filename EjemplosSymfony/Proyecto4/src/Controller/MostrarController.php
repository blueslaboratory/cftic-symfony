<?php

namespace App\Controller;

use App\Entity\Hospital;
use App\Repository\HospitalRepository;
use Doctrine\ORM\EntityManagerInterface;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;



class MostrarController extends AbstractController
{
    // localhost:8000/mostrarHospis
    #[Route('/verHospi', name: 'mostrarHospis')]
    public function mostrarHospi(Request $request, EntityManagerInterface $em)
    {
        $datos = $em->getRepository(Hospital::class)->findAll();

        return $this->render('mostrar/verHospitales.html.twig', [
            'datosHospis' => $datos
        ]);
    }
}

?>