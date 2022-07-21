<?php

namespace App\Controller;

use App\Entity\Enfermo;
use App\Repository\EnfermoRepository;

use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SesionPacientesController extends AbstractController
{

    // localhost:8000/inicioPacientes
    #[Route('/inicioPacientes', name: 'inicioPacientes')]
    public function inicioPacientes(Request $request)
    {
        return $this->render('pacientes/inicioPacientes.html.twig');
    }

    // localhost:8000/ingresoPaciente
    #[Route('/ingresoPaciente', name: 'ingresoPaciente')]
    public function ingresoPaciente(Request $request, EntityManagerInterface $em)
    {
        $numSS = $request->request->get('numSS');
        $flag = $em->getRepository(Enfermo::class)->find($numSS);
        
        $session = $request->getSession();
        $session->set('numSS', $numSS);
        $sessionNumSS = $request->getSession()->get('numSS');

        if($flag){
            return $this->render('pacientes/inicioPacientes.html.twig',[
                'mensaje' => 'ENFERMO YA INGRESADO',
            ]);
        }else{
            return $this->render('pacientes/ingresoPaciente.html.twig',[
                'numSS' => $sessionNumSS
            ]);
        }
    }

     // localhost:8000/insertarPaciente
     #[Route('/insertarPaciente', name: 'insertarPaciente')]
     public function insertarPaciente(Request $request, EntityManagerInterface $em)
     {
        /*
        Procedimiento
        CREATE procedure InsertarPaciente(IN insc int(11), IN ape varchar(40), IN dir varchar(50), IN fnac date, IN sex varchar(1), IN numSS int(11))
        INSERT INTO enfermo(inscripcion, apellido, direccion, fecha_nac, sexo, nss) 
        VALUES(insc, ape, dir, fnac, sex, numSS);
        */

        $numSS = $request->getSession()->get('numSS');

        $inscripcion = $request->request->get('inscripcion');
        $apellido = $request->request->get('apellido');
        $direccion = $request->request->get('direccion');
        $fnac = $request->request->get('fnac');
        $sexo = $request->request->get('sexo');

        $connection = $em->getConnection();
        $statement = $connection->prepare("CALL InsertarPaciente(:inscripcion, :apellido, :direccion, :fecha_nac, :sexo, :nss)");
        // aqui le puedo meter cualquier instruccion nativa de la base de datos

        // parece que llegan como string pero automáticamente los castea 
        // dump($numSS, $inscripcion, $apellido, $direccion, $fnac, $sexo);

        $statement->bindValue('nss', $numSS);
        $statement->bindValue('inscripcion', $inscripcion);
        $statement->bindValue('apellido', $apellido);
        $statement->bindValue('direccion', $direccion);
        $statement->bindValue('fecha_nac', $fnac);
        $statement->bindValue('sexo', $sexo);
        
        $statement->executeStatement();

        return $this->render('pacientes/inicioPacientes.html.twig',[
            'mensaje' => 'ENFERMO CON NÚMERO DE LA Seguridad Social ' . $numSS . ' INGRESADO CON ÉXITO'
        ]);
     }

}