<?php

namespace App\Controller;

use App\Entity\DoctorPrueba;
use App\Repository\DoctorPruebaRepository;
use App\Entity\Hospital;
use App\Repository\HospitalRepository;
use App\Entity\Plantilla;
use App\Repository\PlantillaRepository;

use Doctrine\ORM\EntityManagerInterface;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class AjaxHospitalController extends AbstractController
{
    // 56 - VISTAS PARCIALES DATOS HOSPITALES
    // localhost:8000/indexAjaxHospi
    #[Route('/indexAjaxHospi', name: 'indexAjaxHospi')]
    public function indexAjaxHospi()
    {
        return $this->render('ajaxHospital/indexAjaxHospi.html.twig');
    }

    // localhost:8000/ajaxDoctores
    #[Route('/ajaxDoctores', name: 'ajaxDoctores')]
    public function ajaxDoctores(EntityManagerInterface $em)
    {
        $datos = $em->getRepository(DoctorPrueba::class)->findAll();

        return $this->render('ajaxHospital/doctor.html.twig', [
            'datosDoctores' => $datos
        ]);
    }

    // localhost:8000/ajaxHospitales
    #[Route('/ajaxHospitales', name: 'ajaxHospitales')]
    public function ajaxHospitales(EntityManagerInterface $em)
    {
        $datos = $em->getRepository(Hospital::class)->findAll();

        return $this->render('ajaxHospital/hospital.html.twig', [
            'datosHospitales' => $datos
        ]);
    }
    
    // localhost:8000/ajaxPlantilla
    #[Route('/ajaxPlantilla', name: 'ajaxPlantilla')]
    public function ajaxPlantilla(EntityManagerInterface $em)
    {
        $datos = $em->getRepository(Plantilla::class)->findAll();

        return $this->render('ajaxHospital/plantilla.html.twig', [
            'datosPlantilla' => $datos
        ]);
    }
    
}
