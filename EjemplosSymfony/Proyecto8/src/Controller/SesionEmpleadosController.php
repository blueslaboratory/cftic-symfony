<?php

namespace App\Controller;

use App\Entity\Emp;
use App\Repository\EmpRepository;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SesionEmpleadosController extends AbstractController
{

    // localhost:8000/borrarEmpleadosSesion
    #[Route('/borrarEmpleadosSesion', name: 'borrarEmpleadosSesion')]
    public function borrarEmpleadosSesion(Request $request, EntityManagerInterface $em)
    {
        // Crear y limpiar la sesion
        $session = $request->getSession();
        $session->clear();

        return $this->redirect('inicioEmpleadosSesion');
    }

    // localhost:8000/inicioEmpleadosSesion
    #[Route('/inicioEmpleadosSesion', name: 'inicioEmpleadosSesion')]
    public function inicioEmpleadosSesion(Request $request, EntityManagerInterface $em)
    {
        $empleados = $em->getRepository(Emp::class)->findAll();
        return $this->render('empleadosSesion/empleadosSesion.html.twig',[
            'empleados' => $empleados,
        ]);
    }

    // localhost:8000/almacenarEmpleado
    #[Route('/almacenarEmpleado', name: 'almacenarEmpleado')]
    public function almacenarEmpleado(Request $request, EntityManagerInterface $em)
    {
        $datoget = intval($request->query->get('id'));
        $datosEmp = $em->getRepository(Emp::class)->findByEmpNo($datoget);

        // crear session y coger el valor
        $session = $request->getSession();
        // todos los set que yo escriba son variables session que te guardo a ti en el servidor
        // seria mas optimo guardar un array al que le vas sumando los objetos de una hipotetica clase empleado
        // y tener asi una unica variable session que contenga el gran array de arrays xD
        $session->set($datoget, $datosEmp);
        dump($session);


        $empleados = $em->getRepository(Emp::class)->findAll();
        return $this->render('empleadosSesion/empleadosSesion.html.twig',[
            'empleados' => $empleados,
        ]);
    }

    // localhost:8000/resumenEmpleado
    #[Route('/resumenEmpleado', name: 'resumenEmpleado')]
    public function resumenEmpleado(Request $request)
    {
        $session = $request->getSession()->all();
        dump($session);

        // suma salarial
        $sumaSalarial = 0;
        foreach ($session as $empleados) {
            $empleados[0]->getSalario();
            $sumaSalarial += $empleados[0]->getSalario();
        }

        return $this->render('empleadosSesion/empleadosResumenSesion.html.twig',[
            'empleados' => $session,
            'sumaSalarial' => $sumaSalarial
        ]);
    }


    // localhost:8000/quitarEmpleado
    #[Route('/quitarEmpleado', name: 'quitarEmpleado')]
    public function quitarEmpleado(Request $request)
    {
        $datoget = intval($request->query->get('id'));

        $session = $request->getSession();
        $session->remove($datoget);
        
        return $this->redirect('resumenEmpleado');
    }

}