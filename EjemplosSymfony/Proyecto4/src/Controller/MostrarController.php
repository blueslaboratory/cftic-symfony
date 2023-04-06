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
    #[Route('/verDept', name: 'mostrarDept')]
    public function mostrarDept(Request $request, EntityManagerInterface $em)
    {
        $datos = $em->getRepository(Dept::class)->findAll();

        return $this->render('mostrar/verDepartamentos.html.twig', [
            'datosDepts' => $datos
        ]);
    }


    // localhost:8000/buscarDept
    #[Route('/buscarDept', name: 'buscar')]
    public function buscar(Request $request, EntityManagerInterface $em)
    {
        // Al hacer submit los datos los has perdido y hay que recuperarlos: findAll
        $datos = $em->getRepository(Dept::class)->findAll();

        // Al hacer un formulario y darle al submit directamente se me crea un objeto 
        // request y puedo recoger todos los datos
        $identificador = $request->request->get('cmbDepart');
        dump($identificador);
        $datosf = $em->getRepository(Dept::class)->find($identificador);
        dump($datosf);

        return $this->render('mostrar/verDepartamentos.html.twig', [
            'datosDepts' => $datos,
            'datosDeptf' => $datosf,
            'seleccionado' => $identificador
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