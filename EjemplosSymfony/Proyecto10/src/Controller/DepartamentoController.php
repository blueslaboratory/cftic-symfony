<?php

namespace App\Controller;

use App\Entity\Dept;
use App\Repository\DeptRepository;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DepartamentoController extends AbstractController
{

    //localhost:8000/mostrarDept
    #[Route('/mostrarDept', name: 'mostrarDept')]
    public function mostrarDept(EntityManagerInterface $em)
    {
        $datos = $em->getRepository(Dept::class)->findAll();

        return $this->render('departamento/mostrarDept.html.twig', [
            'departamentos' => $datos
        ]);
    }


    //localhost:8000/borrarDept
    #[Route('/borrarDept', name: 'borrarDept')]
    public function borrarDept(Request $request, EntityManagerInterface $em)
    {
        $datos = $em->getRepository(Dept::class)->findAll();

        // para dato POST:
        // $identificador = $request->request->get('id');
        // para dato GET:
        $identificador = intval($request->query->get('id'));
        $datosBorrados = $em->getRepository(Dept::class)->find($identificador);

        if (!$datosBorrados) {
            return $this->render('departamento/mostrarDept.html.twig', [
                'departamentos' => $datos,
                'mensaje' => 'Departamento no existe'
            ]);
        }

        $em->remove($datosBorrados);
        $em->flush();

        // hay que volverlos a cargar
        $datos = $em->getRepository(Dept::class)->findAll();

        return $this->render('departamento/mostrarDept.html.twig', [
            'departamentos' => $datos,
            'mensaje' => 'Departamento borrado'
        ]);
    }


    // localhost:8000/editarDept
    #[Route('/editarDept', name: 'editarDept')]
    public function editarDept(Request $request, EntityManagerInterface $em)
    {
        $identificador = intval($request->query->get('id'));
        $departamento = $em->getRepository(Dept::class)->find($identificador);

        return $this->render('departamento/editarDept.html.twig', [
            'departamento' => $departamento
        ]);
    }


    // localhost:8000/modificarDept
    #[Route('/modificarDept', name: 'modificarDept')]
    public function modificarDept(Request $request, EntityManagerInterface $em)
    {
        // Podemos obtener el EntityManager a través de inyección de dependencias con el argumento EntityManagerInterface $em
        // 1) recibir datos del formulario
        $identificador = intval($request->request->get('txtId'));
        dump($identificador);
        $nombre = $request->request->get('txtNombre');
        dump($nombre);
        $loc = $request->request->get('txtLoc');
        dump($loc);

        $departamento = $em->getRepository(Dept::class)->find($identificador);

        $departamento->setDnombre($nombre);
        $departamento->setLoc($loc);

        $em->persist($departamento);
        // Para ejecutar las queries pendientes, se utiliza flush().

        $em->flush();

        return $this->redirectToRoute("mostrarDept");
    }


    // localhost:8000/nuevoDept
    #[Route('/nuevoDept', name: 'nuevoDept')]
    public function nuevoDept()
    {
        return $this->render('departamento/nuevoDept.html.twig');
    }


    // localhost:8000/insertarDept
    #[Route('/insertarDept', name: 'insertarDept')]
    public function insertarDept(Request $request, EntityManagerInterface $em)
    {
        // Podemos obtener el EntityManager a través de inyección de dependencias con el argumento EntityManagerInterface $em
        // 1) recibir datos del formulario
        $nombre = $request->request->get('txtNombre');
        $loc = $request->request->get('txtLoc');

        // 2) dar de alta en bbdd 
        $departamento = new Dept();
        $departamento->setDnombre($nombre);
        $departamento->setLoc($loc);
        // Informamos a Doctrine de que queremos guardar el Grado (todavía no se ejecuta ninguna query)

        $em->persist($departamento);
        // Para ejecutar las queries pendientes, se utiliza flush().

        $em->flush();

        // 3) redirigir al formulario. Coincide con eln nombre de la ruta del método anterior: name: 'nuevoDepart
        return $this->redirectToRoute("mostrarDept");
    }

}
