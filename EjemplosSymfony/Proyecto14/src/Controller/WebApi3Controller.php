<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

// 08/09/2022

// 76 - WEB API EMPLEADOS CORE

// ProyectoWebApi3

// PS C:\xampp\htdocs\CFTIC\EjemplosSymfony\Proyecto14> php -S localhost:8000 -t public/

class WebApi3Controller extends AbstractController
{

    // http://localhost:8000/homeEmpleados3/
    #[Route('/homeEmpleados3', name: 'homeEmpleados3')]
    public function homeEmpleados(Request $request)
    {
        return $this->render('empleados3/homeEmpleados3.html.twig', [
        ]);
    }

    // http://localhost:8000/empleados3/
    #[Route('/empleados3', name: 'empleados3')]
    public function empleados(Request $request)
    {
        $empleados = file_get_contents("https://proyectowebapi3.azurewebsites.net/api/Empleados");
        $datosEmpleados = json_decode($empleados, true);
        dump($datosEmpleados);

        return $this->render('empleados3/empleados3.html.twig', [
            'empleados' => $datosEmpleados
        ]);
    }

    // http://localhost:8000/buscarId3
    #[Route('/buscarId3', name: 'buscarId3')]
    public function buscarId(Request $request)
    {
        $id = intval($request->request->get("txtId"));
        dump($id);

        $empleados = file_get_contents("https://proyectowebapi3.azurewebsites.net/api/Empleados/" . $id);
        $datosEmpleados = json_decode($empleados, true);
        dump($datosEmpleados);

        return $this->render('empleados3/buscarEmpleado3.html.twig', [
            'empleados' => $datosEmpleados
        ]);
    }

    // http://localhost:8000/filtroSalarios
    #[Route('/filtroSalarios', name: 'filtroSalarios')]
    public function filtroSalarios(Request $request)
    {
        $salario = intval($request->request->get("txtSalario"));
        dump($salario);

        $empleados = file_get_contents("https://proyectowebapi3.azurewebsites.net/api/empleados/GetEmpleadosSalario/" . $salario);
        $datosEmpleados = json_decode($empleados, true);
        dump($datosEmpleados);

        return $this->render('empleados3/empleados3.html.twig', [
            'empleados' => $datosEmpleados
        ]);
    }
}