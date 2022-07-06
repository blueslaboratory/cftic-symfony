<?php

namespace App\Controller;

use App\Entity\Hospital;
use App\Entity\Dept;
use App\Repository\HospitalRepository;
use App\Repository\DeptRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping\Entity;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;



class MostrarController extends AbstractController
{
    // localhost:8000/verDept
    #[Route('/verDept', name:'mostrarDept')]
    public function mostrarDept(Request $request, EntityManagerInterface $em)
    {
        $datos = $em->getRepository(Dept::class)->findAll();

        return $this->render('mostrar/verDepartamentos.html.twig', [
            'datosDepts' => $datos
        ]);
    }

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