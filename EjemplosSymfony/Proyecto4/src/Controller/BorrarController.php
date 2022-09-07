<?php

namespace App\Controller;

use App\Entity\Dept;
use App\Entity\Hospital;
use App\Repository\DeptRepository;
use Doctrine\ORM\EntityManagerInterface;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class BorrarController extends AbstractController
{

    // localhost:8000/borrarDepart
    #[Route('/borrarDepart', name: 'elimDepart')]
    public function elimDepart()
    {
        return $this->render('borrado/eliminar.html.twig');
    }


    #[Route('/borrar', name: 'eliminarDepart')]
    public function borrarDepart(Request $request, EntityManagerInterface $em)
    {
        $identificador = $request->request->get('txtId');
        dump($identificador);
        $datos = $em->getRepository(Dept::class)->find($identificador);

        if (!$datos) {
            return $this->render('borrado/noEncontrado.html.twig', [
                'mensaje' => 'Departamento no existe'
            ]);
        }
        $em->remove($datos);
        $em->flush();
        return $this->render('borrado/ok.html.twig', [
            'mensaje' => 'Dato eliminado correctamente:' . $identificador
        ]);
    }


    // localhost:8000/borrarHospi
    #[Route('/borrarHospi', name: 'borrarHospi')]
    public function elimHospi()
    {
        return $this->render('borrado/eliminarHospi.html.twig');
    }


    #[Route('/borrarH', name: 'eliminarHospi')]
    public function borrarHospi(Request $request, EntityManagerInterface $em)
    {

        $id = $request->request->get('txtId');
        $datos = $em->getRepository(Hospital::class)->find($id);

        if (!$datos) {
            return $this->render('borrado/noEncontrado.html.twig', [
                'mensaje' => 'Hospital no existe'
            ]);
        }
        $em->remove($datos);
        $em->flush();
        return $this->render('borrado/ok.html.twig', [
            'mensaje' => 'Hospital ' .$id. ' eliminado correctamente:'
        ]);
    }

}