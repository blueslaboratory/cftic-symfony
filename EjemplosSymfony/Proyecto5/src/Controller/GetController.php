<?php

namespace App\Controller;

use App\Entity\Dept;
use App\Repository\DeptRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping\Id;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class GetController extends AbstractController
{

    // localhost:8000/inicio
    #[Route('/inicio', name: 'home')]
    public function home()
    {
        return $this->render('get/inicio.html.twig');
    }

    // localhost:8000/create
    #[Route('/create', name: 'ver_datos')]
    public function ver_datos(Request $request, EntityManagerInterface $em)
    {
        $datoget = $request->query->get('id');
        $datos = $em->getRepository(Dept::class)->findById($datoget);

        if (!$datos) {
            return $this->render('get/verDatos.html.twig', [
                'mensaje' => 'Departamento no existe'
            ]);
        } else {
            return $this->render('get/verDatos.html.twig', [
                'datosDept' => $datos,
            ]);
        }
    }

}
