<?php

namespace App\Controller;

use App\Entity\Emp;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Utilidades\Despedidos;

class SesionEmpleadosController2 extends AbstractController
{
    #[Route('/inicio', name: 'inicio')]
    public function inicio(Request $request, EntityManagerInterface $em)
    {
        $empleados = $em->getRepository(Emp::class)->findAll();

        $session = $request->getSession();

        //Comprobamos que ya existe la variable con despedidos
        if((!$session->has("arrayGlobalEmp"))){
            //Si no existe creamos un array nuevo
            $arrayDespedidos = [];
            $numDespedidos = 0;
        }else{
            //Si existe lo recuperamos de la sesión
            $arrayDespedidos = $session->get("arrayGlobalEmp");
            $numDespedidos = count($arrayDespedidos);
        }
        return $this->render('empleadosSesion2/inicio.html.twig', [
            'empleados'        => $empleados,
            'arrayDespedidos'  => $arrayDespedidos,
            'numDespedidos'    => $numDespedidos 
        ]);
    }

    #[Route('/despedir', name: 'despedir')]
    public function despedir(Request $request, EntityManagerInterface $em)
    {
        $id = $request->query->get('id');
        //Recuperar datos del empleado de la BD
        $empleado  = $em->getRepository(Emp::class)->find($id);
        $apellido  = $empleado->getApellido();
        $oficio    = $empleado->getOficio();
        $salario   = $empleado->getSalario();
        //Creo objeto de la clase Despedidos y almacenos los datos recuperados en el paso anterior
        $despedido = new Despedidos;
        $despedido->id          = $id;
        $despedido->apellido    = $apellido;
        $despedido->oficio      = $oficio;
        $despedido->salario     = $salario;

        $session = $request->getSession();

        if ((!$session->has("arrayGlobalEmp"))) {
            //Si no existe la variable de sesion creamos un array y añadimos el ojeto despedido 
            $arrayGlobalEmp = [];
            $arrayGlobalEmp[$id] = $despedido;
        } else {
            //Si existe recuperamos el array de objetos despedidos y le añadimos el nuevo objeto despedido
            $arrayGlobalEmp = $session->get("arrayGlobalEmp");
            $arrayGlobalEmp[$id] = $despedido;
        }
        //Actualizar variable de sesión de despedidos
        $session->set("arrayGlobalEmp", $arrayGlobalEmp);
        //Recuperar los variable de sesión de despedidos
        $arrayDespedidos = $session->get("arrayGlobalEmp");
        dump('$arrayDespedidos en despedir', $arrayDespedidos);

        $empleados = $em->getRepository(Emp::class)->findAll();

        $numDespedidos = count($arrayDespedidos);

        return $this->render('empleadosSesion2/inicio.html.twig', [
            'empleados'        => $empleados,
            'arrayDespedidos'  => $arrayDespedidos,
            'numDespedidos'    => $numDespedidos,
        ]);
    }

    #[Route('/listar', name: 'listar')]
    public function listar(Request $request, EntityManagerInterface $em)
    {
        $session   = $request->getSession();
        $arrayDespedidos = [];
        $arrayDespedidos = $session->get("arrayGlobalEmp");

        $sumaSalarios = 0;
        if(!empty($arrayDespedidos)){
            foreach ($arrayDespedidos as $desp) {
                $sumaSalarios += $desp->salario;
            }
        }

        $sumaSalarios = number_format($sumaSalarios, 2, ',', '.');

            return $this->render('empleadosSesion2/listado.html.twig', [
                'arrayDespedidos'  => $arrayDespedidos,
                'sumaSalarios'     => $sumaSalarios
            ]);
        
    }

    #[Route('/readmitir', name: 'readmitir')]
    public function readmitir(Request $request, EntityManagerInterface $em)
    {
        $id = $request->query->get('id');
        
        $session   = $request->getSession();
        $arrayGlobalEmp = $session->get("arrayGlobalEmp");
        //Eliminamos el despedido del array de despedidos
        unset($arrayGlobalEmp[$id]);
        //Actualizamos la variable de sesión con el array de despedidos
        $session->set("arrayGlobalEmp", $arrayGlobalEmp);
        //Recuperar los variable de sesión de despedidos
        $arrayDespedidos = $session->get("arrayGlobalEmp");

        $sumaSalarios = 0;
        foreach ($arrayDespedidos as $desp) {
            $sumaSalarios += $desp->salario;
        }
        $sumaSalarios = number_format($sumaSalarios, 2, ',', '.');

        return $this->render('empleadosSesion2/listado.html.twig', [
            'arrayDespedidos'  => $arrayDespedidos,
            'sumaSalarios'     => $sumaSalarios
        ]);
    }

    #[Route('/limpiar', name: 'limpiar')]
    public function limpiar(Request $request, EntityManagerInterface $em)
    {
        $session = $request->getSession();
        $session->clear();

        $empleados = $em->getRepository(Emp::class)->findAll();
        $arrayDespedidos = [];
        $numDespedidos = 0;
        return $this->redirectToRoute('listar');
        
    }
}

