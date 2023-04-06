<?php

namespace App\Controller;

use App\Entity\Hospital;
use App\Entity\Plantilla;

use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HospitalController extends AbstractController
{

    // localhost:8000/hospitales
    #[Route('/hospitales', name: 'hospitales')]
    public function hospitales(EntityManagerInterface $em)
    {
        $datos = $em->getRepository(Hospital::class)->findAll();

        if (!$datos) {
            return $this->render('hospital/maestro.html.twig', [
                'mensajeHospital' => 'No existen hospitales'
            ]);
        } else {
            return $this->render('hospital/maestro.html.twig', [
                'datosHospi' => $datos,
                'mensajePlantilla' => ''
            ]);
        }
    }


    // localhost:8000/mostrarPlantilla
    #[Route('/mostrarPlantilla', name: 'mostrarPlantilla')]
    public function mostrarPlantilla(Request $request, EntityManagerInterface $em)
    {
        $datoget = $request->query->get('id');
        $datosHospital = $em->getRepository(Hospital::class)->findAll();
        $datosPlantilla = $em->getRepository(Plantilla::class)->findByHospitalCod($datoget);

        if (!$datosHospital) {
            return $this->render('hospital/maestro.html.twig', [
                'mensajeHospital' => 'No existen hospitales',
            ]);
        } elseif (!$datosPlantilla){
            return $this->render('hospital/maestro.html.twig', [
                'datosHospi' => $datosHospital,
                'mensajePlantilla' => 'No existen detalles',
            ]);
        } else {
            return $this->render('hospital/maestro.html.twig', [
                'datosHospi' => $datosHospital,
                'datosPlantilla' => $datosPlantilla
            ]);
        }
    }
}