<?php

namespace App\Controller;

use App\Entity\Localizacion;
use App\Repository\LocalizacionRepository;
use App\Entity\Actividades;
use App\Repository\ActividadesRepository;

use Doctrine\ORM\EntityManagerInterface;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\Security\Core\Security;

class ActividadesController extends AbstractController
{
    // localhost:8000/actividades
    #[Route('/actividades', name: 'actividades')]
    public function actividades(): Response
    {
        return $this->render('actividades/actividades.html.twig', []);
    }

    // localhost:8000/actividadesFlipBox
    #[Route('/actividadesFlipBox', name: 'actividadesFlipBox')]
    public function actividadesFlipBox(Request $request, EntityManagerInterface $em): Response
    {
        $municipio = 'MADRID';
        $query = $em->createQuery('SELECT DISTINCT(l.distrito) AS distrito FROM App\Entity\Localizacion l 
                                   WHERE l.municipio = :m ORDER BY distrito ASC');
        $query->setParameter('m', $municipio);
        $distritos = $query->getResult();
        // var_dump($distritos);

        $actividades = $em->getRepository(Actividades::class)->findAll();
        // dump($actividades);

        return $this->render('actividades/actividadesFlipBox.html.twig', [
            'distritos' => $distritos,
            'actividades' => $actividades
        ]);
    }

    // localhost:8000/actividadesDistrito
    #[Route('/actividadesDistrito', name: 'actividadesDistrito')]
    public function actividadesDistrito(Request $request, EntityManagerInterface $em): Response
    {
        $municipio = 'MADRID';
        $query = $em->createQuery('SELECT DISTINCT(l.distrito) AS distrito FROM App\Entity\Localizacion l 
                                   WHERE l.municipio = :m ORDER BY distrito ASC');
        $query->setParameter('m', $municipio);
        $distritos = $query->getResult();
        // var_dump($distritos);

        // Al hacer un formulario y darle al submit directamente se me crea un objeto 
        // request y puedo recoger todos los datos
        $distrito = $request->request->get('distrito');
        dump($distrito);


        //$actividades = $em->getRepository(Actividades::class)->findAll();
        //dump($actividades);

        // TODO esto me da error y no sé por qué aún:
        // $actividades = $em->getRepository(Actividades::class)->findByDistrito($distrito);
        // $actividades = $em->getRepository(Actividades::class)->findBy(
        //     ['distrito' => $distrito],
        // );
        // $query = $em->createQuery('SELECT a AS actividad FROM App\Entity\Actividades a 
        //                            WHERE a.distrito = :d');
        // $query->setParameter('d', $distrito);
        // dump($query);
        // $actividades = $query->getResult();
        // dump($actividades);


        // esta query ya funciona, lo otro no funciona porque hay objeto localizacion y tampoco voy a llenar
        // las tablas de claves foraneas, porque habria que volver a tocar toda la DB
        $connection = $em->getConnection();
        $statement = $connection->prepare("SELECT * FROM ACTIVIDADES WHERE DISTRITO=:dato");
        $statement->bindValue('dato', $distrito);
        $resultado = $statement->executeQuery();
        $actividades = $resultado->fetchAllAssociative();

        dump($actividades);

        return $this->render('actividades/actividadesFlipBox.html.twig', [
            'distritos' => $distritos,
            'actividades' => $actividades,
            'seleccionado' => $distrito
        ]);
    }

    // localhost:8000/actividadDetalle
    #[Route('/actividadDetalle', name: 'actividadDetalle')]
    public function actividadDetalle(Request $request, EntityManagerInterface $em): Response
    {
        $datoget = intval($request->query->get('cod'));
        // $actividad = $em->getRepository(Actividades::class)->findByCodActividad($datoget);
        $query = $em->createQuery('SELECT a AS actividad FROM App\Entity\Actividades a 
                                   WHERE a.codactividad = :c');
        $query->setParameter('c', $datoget);
        dump($query);
        $actividad = $query->getResult();

        return $this->render('actividades/actividadDetalle.html.twig', [
            'cod' => $datoget,
            'actividad' => $actividad
        ]);
    }


    // FALTA ESTO
    // localhost:8000/inscripcion
    #[Route('/inscripcion', name: 'inscripcion')]
    public function inscripcion(Security $security, Request $request, EntityManagerInterface $em): Response
    {

        $datoget = intval($request->query->get('cod'));
        // $actividad = $em->getRepository(Actividades::class)->findByCodActividad($datoget);
        $query = $em->createQuery('SELECT a AS actividad FROM App\Entity\Actividades a 
                                   WHERE a.codactividad = :c');
        $query->setParameter('c', $datoget);
        dump($query);
        $actividad = $query->getResult();
        dump($actividad);


        $pupilo = $security->getUser();

        // coger inscritos/cupo, codactividad
        $query = $em->createQuery('SELECT i AS inscritos FROM App\Entity\Actividades i');
        dump($query);
        $inscritos = $query->getResult();
        $query = $em->createQuery('SELECT c AS cupo FROM App\Entity\Actividades c');
        $cupo = $query->getResult();
        $query = $em->createQuery('SELECT c AS codactividad FROM App\Entity\Actividades c');
        $codactividad = intval($query->getResult());

        // comprobar que no esta en la tabla pupilos_actividades
        // $query = $em->createQuery('SELECT NICK_PA AS PA FROM App\Entity\Pupilos_Actividades PA
        //                            WHERE PA.CODACTIVIDAD_PA = :c');
        // $query->setParameter('c', $codactividad);
        // $nick = $query->getResult();

        // inscripcion
        if($inscritos >= $cupo){
            $mensaje = "Lo sentimos, el cupo esta completo";
        }
        elseif(isset($nick)){
            $mensaje = "Ya se encuentra inscrito en esta actividad";
        }
        else{
            $actividad = $em->getRepository(Actividades::class)->find($datoget);
            $actividad->setInscritos(intval($inscritos)+1);
            
            $mensaje = "Inscripcion realizada correctamente";
        }

        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        // return $this->redirectToRoute("actividadDetalle");
        
        return $this->render('actividades/actividadDetalle.html.twig', [
            'cod' => $datoget,
            'actividad' => $actividad,
            'mensaje' => $mensaje
        ]);
    }


    // FALTA ESTO
    // VER proyect8 -> SesionPacientesController.php
    // localhost:8000/crearActividad
    #[Route('/crearActividad', name: 'crearActividad')]
    public function crearActividad(Request $request, EntityManagerInterface $em)
    {
        $municipio = 'MADRID';
        $query = $em->createQuery('SELECT DISTINCT(l.distrito) AS distrito FROM App\Entity\Localizacion l 
                                   WHERE l.municipio = :m ORDER BY distrito ASC');
        $query->setParameter('m', $municipio);
        $distritos = $query->getResult();

        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        return $this->render('actividades/actividadCrear.html.twig', [
            'distritos' => $distritos,
        ]);
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

     // localhost:8000/insertarActividad
     #[Route('/insertarActividad', name: 'insertarActividad')]
     public function insertarActividad(Request $request, EntityManagerInterface $em)
     {
        /*
        Procedimiento
        CREATE procedure insertarActividad(
            IN apellido int(11), 
            IN apellido varchar(40), 
            IN direccion varchar(50), 
            IN sensei date, 
            IN precio varchar(1), 
            IN inscritos int(11)),
            
            IN cupo varchar(50), 
            IN finicio date, 
            IN ffin varchar(1), 
            IN descripcion int(11)),
        INSERT INTO enfermo(inscripcion, apellido, direccion, fecha_nac, sexo, nss) 
        VALUES(insc, ape, dir, fnac, sex, numSS);
        */

        // $numSS = $request->getSession()->get('numSS');

        $inscripcion = $request->request->get('nombre');
        $apellido = $request->request->get('municipio');
        $direccion = $request->request->get('distrito');
        $sensei = $request->request->get('sensei');
        $precio = $request->request->get('precio');
        $inscritos = $request->request->get('inscritos');
        $cupo = $request->request->get('cupo');
        $finicio = $request->request->get('finicio');
        $ffin = $request->request->get('ffin');
        $descripcion = $request->request->get('descripcion');
        


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