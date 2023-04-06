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

    // 49 LENGUAJE DQL
    // localhost:8000/buscarOficios1
    #[Route('/buscarOficios1', name: 'buscarOficios1')]
    public function buscarOficios1(Request $request, EntityManagerInterface $em)
    {
        $query = $em->createQuery('SELECT DISTINCT(e.oficio) AS oficio FROM App\Entity\Emp e ORDER BY oficio ASC');
        $datos = $query->getResult();

        // Al hacer un formulario y darle al submit directamente se me crea un objeto 
        // request y puedo recoger todos los datos
        $oficio = $request->request->get('selectOficio');
        
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
