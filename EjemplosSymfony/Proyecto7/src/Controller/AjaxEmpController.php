<?php

namespace App\Controller;

use App\Entity\Emp;
use App\Repository\EmpRepository;

use Doctrine\ORM\EntityManagerInterface;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class AjaxEmpController extends AbstractController
{
    // 58 - EMPLEADOS POR OFICIO
    // localhost:8000/indexAjaxEmp
    #[Route('/indexAjaxEmp', name: 'indexAjaxEmp')]
    public function indexAjaxEmp(Request $request, EntityManagerInterface $em)
    {
        $query = $em->createQuery('SELECT DISTINCT(e.oficio) AS oficio FROM App\Entity\Emp e ORDER BY oficio ASC');
        $datos = $query->getResult();

        //var_dump($datos);

        return $this->render('ajaxEmp/indexAjaxEmp.html.twig', [
            'oficios' => $datos
        ]);
    }

    // localhost:8000/recuperarEmpOficioGet
    #[Route('/recuperarEmpOficioGet', name: 'recuperarEmpOficioGet')]
    public function recuperarEmpOficioGet(Request $request, EntityManagerInterface $em)
    {
        $datoget = $request->query->get('oficio');
        $datosEmp = $em->getRepository(Emp::class)->findByOficio($datoget);

        //var_dump($datosEmp);

        return $this->render('ajaxEmp/verdatos.html.twig', [
            'datosEmpOficio' => $datosEmp,
        ]);
    }
    
}