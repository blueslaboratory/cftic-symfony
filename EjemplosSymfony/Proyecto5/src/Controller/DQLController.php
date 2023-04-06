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

    // 50 - DQL CON PARÁMETROS - 2022/07/13
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


    // 51 - DQL CON LIKE - 2022/07/14
    // localhost:8000/verDatosLike
    #[Route('/verDatosLike', name: 'verDatosLike')]
    public function verDatosLike(Request $request, EntityManagerInterface $em)
    {
        $query = $em->createQuery('SELECT u FROM App\Entity\Dept u WHERE u.loc like :dato');
        $query->setParameter('dato', "B%");

        $datos = $query->getResult();

        return $this->render('get/verDatos.html.twig', [
            'datosDept' => $datos
        ]);
    }


    // 52 - BUSQUEDA DE EMPLEADOS
    // localhost:8000/buscarEmpleadosInicio
    #[Route('/buscarEmpleadosInicio', name: 'buscarEmpleadosInicio')]
    public function buscarEmpleadosInicio()
    {
        return $this->render('empleados/buscarEmpleados.html.twig');
    }

    // localhost:8000/buscarEmpleados
    #[Route('/buscarEmpleados', name: 'buscarEmpleados')]
    public function buscarEmpleados(Request $request, EntityManagerInterface $em)
    {
        $parametroBusqueda = '%' . $request->request->get('apellido') . '%';
        
        $query = $em->createQuery('SELECT e FROM App\Entity\Emp e WHERE UPPER(e.apellido) like UPPER(:dato)');
        $query->setParameter('dato', $parametroBusqueda);

        $query1 = $em->createQuery('SELECT COUNT(e) AS c FROM App\Entity\Emp e WHERE UPPER(e.apellido) like UPPER(:dato)');
        $query1->setParameter('dato', $parametroBusqueda);

        $datos = $query->getResult();
        $count = $query1->getResult();

        //dump($count);
        //dump($count[0]['c']);
        //echo $count[0];

        return $this->render('empleados/buscarEmpleados.html.twig', [
            'datosEmpleados' => $datos,
            'count' => $count[0]['c'], // ['c'] ->nombre donde tienes el atributo que tu quieres
            'parametroBusqueda' => $request->request->get('apellido'),
        ]);
    }
}
