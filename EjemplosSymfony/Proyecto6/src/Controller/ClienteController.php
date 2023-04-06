<?php

namespace App\Controller;

use App\Entity\Fichacliente;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Routing\Annotation\Route;

class ClienteController extends AbstractController
{
    // localhost:8000/createCliente
    #[Route('/createCliente', name: 'createCliente')]
    public function createCliente()
    {
        return $this->render('cliente/fichacliente.html.twig');
    }

    // localhost:8000/insertarCliente
    #[Route('/insertarCliente', name: 'insertarCliente')]
    public function insertarHospi(Request $request, EntityManagerInterface $em)
    {
        // Podemos obtener el EntityManager a través de inyección de dependencias con el argumento EntityManagerInterface $em
        // 1) recibir datos del formulario
        $nombre = $request->request->get('nombre');
        $apellido1 = $request->request->get('apellido1');
        $apellido2 = $request->request->get('apellido2');
        $domicilio = $request->request->get('domicilio');
        $ciudad = $request->request->get('ciudad');
        $sexo = $request->request->get('sex');
        $SO = $request->request->all('so'); //aqui no lleva los corchetes del name
        $comentario = $request->request->get('comentarios');

        $result = '';
        foreach($SO as $item){
            $result .= $item . ',';
        }
        $SOsincoma=substr($result, 0, strlen($result)-1); 

        // 2) dar de alta en bbdd 
        $cliente = new Fichacliente();
        $cliente->setNombre($nombre);
        $cliente->setApellido1($apellido1);
        $cliente->setApellido2($apellido2);
        $cliente->setDomicilio($domicilio);
        $cliente->setCiudad($ciudad);
        $cliente->setSexo($sexo);
        $cliente->setSo($SOsincoma);
        $cliente->setComentario($comentario);
        
        // Informamos a Doctrine de que queremos guardar el Grado (todavía no se ejecuta ninguna query)
        $em->persist($cliente);

        // Para ejecutar las queries pendientes, se utiliza flush().
        $em->flush();

        // echo dump($SOsincoma);

        // 3) redirigir al formulario. Coincide con eln nombre de la ruta del método anterior: name: 'nuevoDepart
        return $this->render('cliente/exito.html.twig', [
            'mensaje' => '¡Enhorabuena! El registro en la DB ha sido un éxito'
        ]);
    }

}