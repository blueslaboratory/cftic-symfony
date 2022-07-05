<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Dept;
use App\Entity\Doctor;
use Doctrine\ORM\EntityManagerInterface;

class PrimerController extends AbstractController
{

    // localhost:8000/altaDepart
    #[Route('/altaDepart', name: 'nuevoDepart')]
    public function nuevoDepart()
    {
        return $this->render('alta.html.twig');
    }


    #[Route('/create', name: 'insertarDepart')]
    public function insertarDepart(Request $request, EntityManagerInterface $em)
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
        return $this->redirectToRoute("nuevoDepart");
    }



    // localhost:8000/altaDoctor
    #[Route('/altaDoctor', name: 'altaDoctor')]
    public function nuevoDoctor()
    {
        return $this->render('altaDoctor.html.twig');
    }


    #[Route('/createDoc', name: 'insertarDoctor')]
    public function insertarDoctor(Request $request, EntityManagerInterface $em)
    {
        // Podemos obtener el EntityManager a través de inyección de dependencias con el argumento EntityManagerInterface $em
        // 1) recibir datos del formulario
        $hospitalCod = $request->request->get('numCodHospi');
        $apellido = $request->request->get('txtApellido');
        $especialidad = $request->request->get('txtEspecialidad');
        $salario = $request->request->get('numSalario');

        // 2) dar de alta en bbdd 
        $doctor = new Doctor();
        $doctor->setHospitalCod($hospitalCod);
        $doctor->setApellido($apellido);
        $doctor->setEspecialidad($especialidad);
        $doctor->setSalario($salario);
        // Informamos a Doctrine de que queremos guardar el Grado (todavía no se ejecuta ninguna query)

        $em->persist($doctor);
        // Para ejecutar las queries pendientes, se utiliza flush().

        $em->flush();

        // 3) redirigir al formulario. Coincide con eln nombre de la ruta del método anterior: name: 'nuevoDepart
        return $this->redirectToRoute("altaDoctor");
    }
}
