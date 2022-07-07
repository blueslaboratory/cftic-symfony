<?php

namespace App\Controller;


use App\Entity\Emp;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;

class OficiosController extends AbstractController
{
    // localhost:8000/oficios
    #[Route('/oficios', name: 'app_oficios')]
    public function index(): Response
    {
        return $this->render('oficios/index.html.twig', [
            'controller_name' => 'OficiosController',
        ]);
    }

    // localhost:8000/verOficios
    #[Route('/verOficios', name: 'mostrarOficios')]
    public function mostrarDept(Request $request, EntityManagerInterface $em)
    {
        $datos = $em->getRepository(Emp::class)->findAll();

        return $this->render('oficios/graficoSalarial.html.twig', [
            'arrayEmpleados' => $datos
        ]);
    }

    // localhost:8000/buscarOficios
    #[Route('/buscarOficios', name: 'buscarOficios')]
    public function buscarOficios(Request $request, EntityManagerInterface $em)
    {
        // Al hacer submit los datos los has perdido y hay que recuperarlos: findAll
        $datos = $em->getRepository(Emp::class)->findAll();

        // Al hacer un formulario y darle al submit directamente se me crea un objeto 
        // request y puedo recoger todos los datos
        $oficio = $request->request->get('selectOficio');
        dump($oficio);
        $datosOficio = $em->getRepository(Emp::class)->findBy(
            ['oficio' => $oficio],
        );
        dump($datosOficio);

        return $this->render('oficios/graficoSalarial.html.twig', [
            'arrayEmpleados' => $datos,
            'datosOficio' => $datosOficio,
            'oficio' => $oficio
        ]);
    }
}
