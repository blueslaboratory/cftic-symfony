<?php

namespace App\Controller;

use App\Entity\Dept;
use App\Repository\DeptRepository;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Mapping\Id;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProcedimientosController extends AbstractController
{
    //54 - EJECUTANDO PROCEDIMIENTOS ALMACENADOS - 2022/07/14
    //localhost:8000\procedimientos
    #[Route('/procedimientos', name: 'procedimientos')]
    public function procedimientos()
    {
        return $this->render('procedimientos/procedimientos.html.twig');
    }

    #[Route('/eliminarDepart', name: 'eliminarDepart')]
    public function eliminarDepart(Request $request, EntityManagerInterface $em)
    {
        $id = $request->request->get('txtId');
        $connection = $em->getConnection();
        $statement = $connection->prepare("CALL borrarDept(:dato)");
        $statement->bindValue('dato', $id);
        $resultado = $statement->executeStatement();

        return $this->render('procedimientos/borrar.html.twig', [
            'afectados' => $resultado,
        ]);
    }


    //localhost:8000\inicioDoctor
    #[Route('/inicioDoctor', name: 'inicioDoctor')]
    public function inicioDoctor()
    {
        return $this->render('procedimientos/inicioDoctor.html.twig');
    }

    #[Route('/altaDoctor', name: 'altaDoctor')]
    public function altaDoctor(Request $request, EntityManagerInterface $em)
    {
        $hospital_cod = $request->request->get('hospital_cod');
        $especialidad = $request->request->get('especialidad');
        $apellido = $request->request->get('apellido');
        $salario = $request->request->get('salario');

        $connection = $em->getConnection();
        $statement = $connection->prepare("CALL insertarDoctor(:apellido, :especialidad, :hospital_cod, :salario)");
        
        $statement->bindValue('apellido', $apellido);
        $statement->bindValue('especialidad', $especialidad);
        $statement->bindValue('hospital_cod', $hospital_cod);
        $statement->bindValue('salario', $salario);

        $resultado = $statement->executeStatement();

        return $this->render('procedimientos/insertarDoctor.html.twig', [
            'afectados' => $resultado,
        ]);
    }
}
