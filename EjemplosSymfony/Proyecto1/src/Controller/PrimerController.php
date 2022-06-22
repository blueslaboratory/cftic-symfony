<?php

/*
22/06/2022
localhost:8000/ejer1
localhost:8000/tabla
localhost:8000/vista1

CTRL D -> selecciona las ocurrencias subrayadas por el raton para despues sustituirlas
*/

// namespace = package
namespace App\Controller;

// use = import
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\Routing\Annotation\Route;


class PrimerController extends AbstractController
{
    // Anotacion o decoracion, se le suele dar un name para llamarla a traves de otra funcion
    #[Route('/ejer1', name: 'inicio')]

    public function inicio()
    {
        $response = new Response();
        $response->setContent("<DIV>HOLA BENITO FLORO</DIV>");
        return $response;
    }


    #[Route('/ejer2', name: 'tabla')]

    public function tabla()
    {
        $response = new Response();
        $response->setContent("
        <form method='GET'>
        
        <table class='table' border='0'>
            <tr>
                <th>COLOR DE FONDO</th>
                <td>
                    <select name='colors'>
                        <option value='red'>Rojo</option>
                        <option value='green'>Verde</option>
                        <option value='blue'>Azul</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th>TIPO DE LETRA</th>
                <td>
                    <select name='font'>
                        <option value='Arial'>Arial</option>
                        <option value='Sans MS'>Sans MS</option>
                        <option value='Courier'>Courier</option>
                        <option value='Times New Roman'>Times New Roman</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th>TEXTO</th>
                <td>
                    <!--
                    <input type='text' name='texto' placeholder='Escribe algo por favor...' value='Default Text'/>
                    -->
                    <textarea type='text' name='texto' placeholder='Escribe algo por favor...'>Default Text</textarea>
                </td>
            </tr>
            <tr>
                <td colspan='2'>
                    <input type='submit' value='Enviar' />
                </td>
            </tr>
        </table>

        </form>

        ");
        return $response;
    }

    #[Route('/vista1', name: 'vista')]
    public function vista()
    {
        // $this hace referencia a la instancia de mi propia clase, vete a la funcion render de mi clase (heredada de AbstractController)
        return $this->render('Deportes/inicio.html.twig');
    }
}
