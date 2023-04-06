<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Doctrine\ORM\EntityManagerInterface;

use Symfony\Component\HttpFoundation\Request;
use App\Entity\Emp;

// 73 - CREACIÓN WEB API CON SYMFONY Y DOCTRINE
// PS C:\xampp\htdocs\CFTIC\EjemplosSymfony\Proyecto13> php -S localhost:8000 -t public/
// hay que tener corriendo servidor (Proyecto 13) y cliente (Proyecto 14)

class HospitalServerController extends AbstractController
{
    
    // http://localhost:8000/lecturaget/
    #[Route('/lecturaget', name: 'inicio')]
    public function inicio(Request $request, EntityManagerInterface $em)
    {

        $query = $em->createQuery(
            'SELECT e.apellido as apellido, e.oficio as oficio, e.salario as salario
             FROM App\Entity\Emp e'
        );

        $datos = $query->getArrayResult();
        return new JsonResponse($datos);
    }
}