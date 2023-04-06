<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

// 06/09/2022
// 07/09/2022

// 75 - CREACION DE UN WEB SERVICE  RESTFUL

// ProyectoWebApi2


// PS C:\xampp\htdocs\CFTIC\EjemplosSymfony\Proyecto14> php -S localhost:8000 -t public/

class WebApi1Controller extends AbstractController
{
    // ProyectoWebApi1
    // http://localhost:8000/apiazure/
    #[Route('/apiazure', name: 'apiazure')]
    public function apiazure(Request $request)
    {
        // si cambias la ciudad en file_get_contents cambia
        $datos = file_get_contents("https://proyectowebapi1.azurewebsites.net/api/values/ciudad/Madrid");
        dump($datos);

        return $this->render('apiAzure/apiAzure.html.twig', [
            'datos' => $datos
        ]);
    }

    // ProyectoWebApi2
    // http://localhost:8000/homeEmpleados/
    #[Route('/homeEmpleados', name: 'homeEmpleados')]
    public function homeEmpleados(Request $request)
    {
        return $this->render('empleados/homeEmpleados1.html.twig', [
        ]);
    }

    // ProyectoWebApi2
    // http://localhost:8000/empleados/
    #[Route('/empleados', name: 'empleados')]
    public function empleados(Request $request)
    {
        $empleados = file_get_contents("https://proyectowebapi2.azurewebsites.net/api/Empleados");
        $datosEmpleados = json_decode($empleados, true);
        dump($datosEmpleados);

        return $this->render('empleados/empleados1.html.twig', [
            'empleados' => $datosEmpleados
        ]);
    }

    // ProyectoWebApi2
    // http://localhost:8000/buscarId
    #[Route('/buscarId', name: 'buscarId')]
    public function buscarId(Request $request)
    {
        $id = intval($request->request->get("txtId"));
        dump($id);

        $empleados = file_get_contents("https://proyectowebapi2.azurewebsites.net/api/Empleados/devolverPorId/" . $id);
        $datosEmpleados = json_decode($empleados, true);
        dump($datosEmpleados);

        return $this->render('empleados/empleados1.html.twig', [
            'empleados' => $datosEmpleados
        ]);
    }

    
}