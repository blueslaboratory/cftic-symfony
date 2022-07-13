<?php

namespace App\Controller;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DQLController extends AbstractController
{

    // localhost:8000/inicioDQL
    #[Route('/inicioDQL', name: 'inicioDQL')]
    public function inicioDQL()
    {
        return $this->render('dql/inicio.html.twig');
    }

    // 50 - DQL CON PARÁMETROS
    // localhost:8000/verDatosDQL
    #[Route('/verDatosDQL', name: 'verDatosDQL')]
    public function verDatosDQL(Request $request, EntityManagerInterface $em)
    {
        $datoget = $request->query->get('id');

        // se hace con el setParameter por seguridad para evitar inyeccion SQL
        // "SELECT u FROM App\Entity\Dept u WHERE u.id = $datoget"
        $query = $em->createQuery('SELECT u FROM App\Entity\Dept u WHERE u.id = :dato');
        $query->setParameter('dato', $datoget);

        $datos = $query->getResult();

        return $this->render('get/verDatos.html.twig', [
            'datosDept' => $datos
        ]);
    }

    // localhost:8000/inicioOficiosDQL
    #[Route('/inicioOficiosDQL', name: 'inicioOficiosDQL')]
    public function inicioOficiosDQL()
    {
        return $this->render('dql/buscar.html.twig');
    }

    // C:\xampp\htdocs\CFTIC\EjemplosSymfony> php -S localhost:8000 -t public/
    // localhost:8000/buscarOficiosDQL
    #[Route('/buscarOficiosDQL', name: 'buscarOficiosDQL')]
    public function buscarOficiosDQL(Request $request, EntityManagerInterface $em)
    {
        $datoPost = $request->request->get('oficio');

        // se hace con el setParameter por seguridad para evitar inyeccion SQL
        // "SELECT u FROM App\Entity\Dept u WHERE u.id = $datoget"
        $query = $em->createQuery('SELECT u.apellido FROM App\Entity\Emp u WHERE u.oficio = UPPER(:dato)');
        $query->setParameter('dato', $datoPost);

        $datos = $query->getResult();
        // imprimir un array
        // echo print_r(dump($datos));
        return $this->render('dql/buscar.html.twig', [
            'apellidos' => $datos
        ]);
    }
}