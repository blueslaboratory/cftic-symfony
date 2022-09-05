<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

// 73 - CREACIÓN WEB API CON SYMFONY Y DOCTRINE
// PS C:\xampp\htdocs\CFTIC\EjemplosSymfony\Proyecto14> php -S localhost:8004 -t public/
// hay que tener corriendo servidor (Proyecto 13) y cliente (Proyecto 14)

class HospitalClienteController extends AbstractController
{
    
    // http://localhost:8004/consumoapi/
    #[Route('/consumoapi', name: 'inicio')]
    public function inicio(Request $request)
    {
        $datos = file_get_contents("http://localhost:8000/lecturaget");
        $datosEmpleados = json_decode($datos, true);

        return $this->render('hospitalCliente/hospitalCliente.html.twig', [
            'datosServicio' => $datosEmpleados
        ]);
    }
}