<?php

namespace App\Controller;

use App\Entity\Dept;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\BrowserKit\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DepartamentosController extends AbstractController
{
    // localhost:8000/deptMultiples
    #[Route('/deptMultiples', name: 'deptMultiples')]
    public function deptMultiples(Request $request, EntityManagerInterface $em)
    {
        // Podemos obtener el EntityManager a través de inyección de dependencias con el argumento EntityManagerInterface $em
        // 1) recibir datos del formulario    
        $boton = $request->request->get('operacion');
        $numero = $request->request->get('numero');
        $nombre = $request->request->get('nombre');
        $localidad = $request->request->get('localidad');

        if ($boton == 'insertar') {
            
            // 2) dar de alta en bbdd 
            $departamento = new Dept();
            $departamento->setDnombre($nombre);
            $departamento->setLoc($loc);
            // Informamos a Doctrine de que queremos guardar el Grado (todavía no se ejecuta ninguna query)

            $em->persist($departamento);
            // Para ejecutar las queries pendientes, se utiliza flush().

            $em->flush();

            // 3) redirigir al formulario. Coincide con eln nombre de la ruta del método anterior: name: 'nuevoDepart
            return $this->redirectToRoute("nuevoDepart");
        } elseif ($boton == 'modificar') {

        } else {
            
        }

        return $this->render('calculadora/index.html.twig', [
            'operacion' => $operacion,
            'resultado' => $resultado
        ]);

        return $this->render('departamentos/departamentos.html.twig', [
            'controller_name' => 'DepartamentosController',
        ]);
    }
}