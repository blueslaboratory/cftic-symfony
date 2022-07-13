<?php

namespace App\Controller;

use App\Entity\Dept;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DepartamentosController extends AbstractController
{

    // localhost:8000/deptInicio
    #[Route('/deptInicio', name: 'deptInicio')]
    public function deptInicio()
    {
        return $this->render('departamentos/departamentos.html.twig');
    }

    // localhost:8000/deptMultiples
    #[Route('/deptMultiples', name: 'deptMultiples')]
    public function deptMultiples(Request $request, EntityManagerInterface $em)
    {
        // Podemos obtener el EntityManager a través de inyección de dependencias con el argumento EntityManagerInterface $em
        // 1) recibir datos del formulario    
        $boton = $request->request->get('operacion');
        $id = $request->request->get('id');
        $nombre = $request->request->get('nombre');
        $localidad = $request->request->get('localidad');

       if ($boton == 'insertar') {
            // 2) dar de alta en bbdd 
            $departamento = new Dept();
            $departamento->setDnombre($nombre);
            $departamento->setLoc($localidad);

            // Informamos a Doctrine de que queremos guardar
            $em->persist($departamento);

            // Para ejecutar las queries pendientes, se utiliza flush().
            $em->flush();

            // 3) redirigir 
            //return $this->redirectToRoute("deptInicio");
            return $this->render('departamentos/departamentos.html.twig',[
                'message' => 'Departamento ' . $departamento->getDnombre() . ' creado'
            ]);

        } elseif ($boton == 'modificar') {
            // este find solo funciona cuando $id es clave principal
            $departamento = $em->getRepository(Dept::class)->find($id);
            $nombreAntiguo = $departamento->getDnombre();
            $departamento->setDnombre($nombre);
            $departamento->setLoc($localidad);

            // Informamos a Doctrine de que queremos guardar
            $em->persist($departamento);

            // Para ejecutar las queries pendientes, se utiliza flush().
            $em->flush();

            // 3) redirigir 
            //return $this->redirectToRoute("deptInicio");
            return $this->render('departamentos/departamentos.html.twig',[
                'message' => "El departamento $nombreAntiguo ha sido modificado: <br>" . 
                              ' - Nuevo nombre: ' . $departamento->getDnombre() . '<br>' .
                              ' - Nueva Localidad: ' . $departamento->getLoc()  
            ]);

        } else {
            // este find solo funciona cuando $id es clave principal
            $departamento = $em->getRepository(Dept::class)->find($id);
            $em->remove($departamento);
            $em->flush();

            //return $this->redirectToRoute("deptInicio");
            return $this->render('departamentos/departamentos.html.twig',[
                'message' => 'Departamento ' . $departamento->getDnombre() . ' eliminado'
            ]);
        }
    }
}
