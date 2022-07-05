<?php

namespace App\Controller;

use App\Entity\Dept;
use App\Entity\Hospital;
use App\Repository\DeptRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping\Id;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ModificarController extends AbstractController
{

    // localhost:8000/modifiDepart
    #[Route('/modifiDepart', name: 'modDepart')]
    public function modDepart()
    {
        return $this->render('modificar/modificar.html.twig');
    }

    #[Route('/modificar', name: 'ModifyDepart')]
    public function ModifyDepart(Request $request, EntityManagerInterface $em)
    {
        // Podemos obtener el EntityManager a través de inyección de dependencias con el argumento EntityManagerInterface $em
        // 1) recibir datos del formulario
        $identificador = $request->request->get('txtId');
        $nombre = $request->request->get('txtNombre');
        $loc = $request->request->get('txtLoc');

        $departamento = $em->getRepository(Dept::class)->find($identificador);

        $departamento->setDnombre($nombre);
        $departamento->setLoc($loc);

        $em->persist($departamento);
        // Para ejecutar las queries pendientes, se utiliza flush().

        $em->flush();

        return $this->redirectToRoute("modDepart");
    }


    // localhost:8000/modifiHospi
    #[Route('/modifiHospi', name: 'modifiHospi')]
    public function modHospi()
    {
        return $this->render('modificar/modificarHospi.html.twig');
    }

    #[Route('/modificarH', name: 'ModifyH')]
    public function ModifyHospi(Request $request, EntityManagerInterface $em)
    {
        // Podemos obtener el EntityManager a través de inyección de dependencias con el argumento EntityManagerInterface $em
        // 1) recibir datos del formulario
        $identificador = $request->request->get('txtId');
        $nombre = $request->request->get('txtNombre');
        $direccion = $request->request->get('txtDireccion');
        $telefono = $request->request->get('txtTelefono');
        $numCama = $request->request->get('numCama');

        $hospital = $em->getRepository(Hospital::class)->find($identificador);

        $hospital->setNombre($nombre);
        $hospital->setDireccion($direccion);
        $hospital->setTelefono($telefono);
        $hospital->setNumCama($numCama);


        $em->persist($hospital);
        // Para ejecutar las queries pendientes, se utiliza flush().

        $em->flush();

        return $this->redirectToRoute("modifiHospi");
    }
}
