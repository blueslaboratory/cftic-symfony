<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CalculadoraController extends AbstractController
{
    // localhost:8000/inicio
    #[Route('/inicio', name: 'verPagina')]
    public function verPagina(Request $request)
    {
        return $this->render('calculadora/index.html.twig');
    }

    // localhost:8000/multiplesDatos
    #[Route('/multiplesDatos', name: 'multiples')]
    public function multiples(Request $request)
    {
        $dato = $request->request->get('operacion');
        $num1 = $request->request->get('numero1');
        $num2 = $request->request->get('numero2');

        if ($dato == 'sumarNumeros') {
            $resultado = $num1 + $num2;
            $operacion = "SUMA";
        } else {
            $resultado = $num1 * $num2;
            $operacion = "MULTIPLICACIÓN";
        }

        return $this->render('calculadora/index.html.twig', [
            'operacion' => $operacion,
            'resultado' => $resultado
        ]);
    }
}
