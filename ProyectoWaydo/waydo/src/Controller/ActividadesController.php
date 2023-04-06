<?php

namespace App\Controller;

use App\Entity\Senseis;
use App\Repository\SenseisRepository;
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
use DateTime;

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

        // $actividades = $em->getRepository(Actividades::class)->findAll();
        // dump($actividades);

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
        dump($actividad);

        return $this->render('actividades/actividadDetalle.html.twig', [
            'cod' => $datoget,
            'actividad' => $actividad
        ]);
    }


    // localhost:8000/inscripcion
    #[Route('/inscripcion', name: 'inscripcion')]
    public function inscripcion(Security $security, Request $request, EntityManagerInterface $em): Response
    {
        $datoget = intval($request->query->get('cod'));
        $actividad = $em->getRepository(Actividades::class)->findBycodactividad($datoget);
        // $actividad = $em->getRepository(Actividades::class)->find($datoget);
        dump($actividad);

        // Haciendolo con DQL seria asi:
        // $query = $em->createQuery('SELECT a AS actividad FROM App\Entity\Actividades a 
        //                            WHERE a.codactividad = :c');
        // $query->setParameter('c', $datoget);
        // dump($query);
        // $actividad = $query->getResult();
        // dump($actividad);

        $pupilo = $security->getUser();
        dump($pupilo);

        // dump($pupilo->nick);
        $id = $pupilo->getId();
        dump($id);

        // coger inscritos/cupo, codactividad
        $inscritos = $actividad[0]->getInscritos();
        dump($inscritos);

        $cupo = $actividad[0]->getCupo();
        dump($cupo);

        $codactividad = $actividad[0]->getCodActividad();
        dump($codactividad);


        // YA FUNSIONA
        // comprobar que no esta en la tabla pupilos_actividades
        $query = $em->createQuery('SELECT PA.nickPa AS NPA FROM App\Entity\PupilosActividades PA
                                   WHERE PA.codactividadPa = :c AND PA.nickPa = :n');
        $query->setParameter('c', $codactividad);
        $query->setParameter('n', $id);
        $nick = $query->getResult();

        // Contar los elementos del array
        // False cuando se encuentra inscrito
        dump(count($nick) != 0);

        $inscrito = false;

        // inscripcion
        if ($inscritos >= $cupo) {
            $mensaje = "Lo sentimos, el cupo esta completo";
        } elseif (count($nick) != 0) {
            $mensaje = "Ya se encuentra inscrito en esta actividad";
            $inscrito = true;
        } else {
            // Aumentar en 1 los inscritos
            $actividad = $em->getRepository(Actividades::class)->find($datoget);
            dump($actividad);
            $actividad->setInscritos(intval($inscritos) + 1);

            // Insertar en la tabla pupilos_actividades
            $connection = $em->getConnection();
            $statement = $connection->prepare("INSERT INTO PUPILOS_ACTIVIDADES VALUES (:id, :cod)");
            $statement->bindValue('id', $id);
            $statement->bindValue('cod', $codactividad);
            $resultado = $statement->executeQuery();
            dump($resultado->fetchAllAssociative());

            // Informamos a Doctrine de que queremos guardar (todavía no se ejecuta ninguna query)
            $em->persist($actividad);

            // Para ejecutar las queries pendientes, se utiliza flush().
            $em->flush();

            $mensaje = "Inscripcion realizada correctamente";
        }

        dump($mensaje);

        $actividad = $em->getRepository(Actividades::class)->findBycodactividad($datoget);
        dump($actividad);

        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        // return $this->redirectToRoute("actividadDetalle");

        return $this->render('actividades/actividadDetalleInscripcion.html.twig', [
            'cod' => $datoget,
            'actividad' => $actividad,
            'mensaje' => $mensaje,
            'inscrito' => $inscrito
        ]);
    }


    // localhost:8000/baja
    #[Route('/baja', name: 'baja')]
    public function baja(Security $security, Request $request, EntityManagerInterface $em): Response
    {
        $datoget = intval($request->query->get('cod'));
        $actividad = $em->getRepository(Actividades::class)->findBycodactividad($datoget);
        // $actividad = $em->getRepository(Actividades::class)->find($datoget);
        dump($actividad);
        
        $pupilo = $security->getUser();
        dump($pupilo);

        // dump($pupilo->nick);
        $id = $pupilo->getId();
        dump($id);

        // coger inscritos/cupo, codactividad
        $inscritos = $actividad[0]->getInscritos();
        dump($inscritos);

        $cupo = $actividad[0]->getCupo();
        dump($cupo);

        $codactividad = $actividad[0]->getCodActividad();
        dump($codactividad);


        // YA FUNSIONA
        // comprobar esta en la tabla pupilos_actividades
        $query = $em->createQuery('SELECT PA.nickPa AS NPA FROM App\Entity\PupilosActividades PA
                                   WHERE PA.codactividadPa = :c AND PA.nickPa = :n');
        $query->setParameter('c', $codactividad);
        $query->setParameter('n', $id);
        $nick = $query->getResult();

        // Contar los elementos del array
        // False cuando se encuentra inscrito
        dump(count($nick) != 0);


        // inscripcion
        if (count($nick) != 0) {
            // Aumentar en 1 los inscritos
            $actividad = $em->getRepository(Actividades::class)->find($datoget);
            $actividad->setInscritos(intval($inscritos) - 1);

            // Borrar registro de la tabla pupilos_actividades
            $connection = $em->getConnection();
            $statement = $connection->prepare("DELETE FROM PUPILOS_ACTIVIDADES WHERE NICK_PA = :id AND CODACTIVIDAD_PA = :cod");
            $statement->bindValue('id', $id);
            $statement->bindValue('cod', $codactividad);
            $resultado = $statement->executeQuery();
            dump($resultado->fetchAllAssociative());

            // Informamos a Doctrine de que queremos guardar (todavía no se ejecuta ninguna query)
            $em->persist($actividad);

            // Para ejecutar las queries pendientes, se utiliza flush().
            $em->flush();

            $inscrito = false;
            $mensaje = "Baja realizada correctamente";
        }
        else{
            $inscrito = false;
            $mensaje = "No esta inscrito en esta actividad";
        }

        dump($mensaje);

        $actividad = $em->getRepository(Actividades::class)->findBycodactividad($datoget);
        dump($actividad);

        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        // return $this->redirectToRoute("actividadDetalle");

        return $this->render('actividades/actividadDetalleInscripcion.html.twig', [
            'cod' => $datoget,
            'actividad' => $actividad,
            'mensaje' => $mensaje,
            'inscrito' => $inscrito
        ]);
    }

    /*
    Intentando hacer una funcion:

    public function todasLasActividades(EntityManagerInterface $em)
    {
        $connection = $em->getConnection();
        $statement = $connection->prepare("SELECT * FROM ACTIVIDADES WHERE DISTRITO=:dato");
        $statement->bindValue('dato', $distrito);
        $resultado = $statement->executeQuery();
        $actividades = $resultado->fetchAllAssociative();

        dump($actividades);
    }
    */


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


    // localhost:8000/insertarActividad
    #[Route('/insertarActividad', name: 'insertarActividad')]
    public function insertarActividad(Request $request, EntityManagerInterface $em)
    {
        // Podemos obtener el EntityManager a través de inyección de dependencias con el argumento EntityManagerInterface $em
        // 1) recibir datos del formulario
        $nombre = $request->request->get('nombre');
        $municipio = $request->request->get('municipio');
        $distrito = $request->request->get('distrito');
        $sensei = $request->request->get('sensei');
        $precio = $request->request->get('precio');
        $inscritos = $request->request->get('inscritos');
        $cupo = $request->request->get('cupo');
        $finicio = new DateTime($request->request->get('finicio'));
        $ffin = new DateTime($request->request->get('ffin'));
        $descripcion = $request->request->get('descripcion');


        // Al quitar las foreign keys esto no hay que hacerlo:

        // 2) dar de alta en bbdd 
        // $sensei = new Senseis();
        // $sensei->setNick($senseiNick);
        // dump($sensei);

        // $localizacion2 = $em->getRepository(Localizacion::class)->find($municipio);
        // dump($localizacion2);
        // $localizacion = new Localizacion();
        // $localizacion->setMunicipio($municipio);
        // $localizacion->setDistrito($distrito);
        // dump($localizacion);

        $actividad = new Actividades();
        $actividad->setNombre($nombre);
        $actividad->setSensei($sensei);
        $actividad->setMunicipio($municipio);
        $actividad->setDistrito($distrito);
        $actividad->setPrecio($precio);
        $actividad->setInscritos($inscritos);
        $actividad->setCupo($cupo);
        $actividad->setFechaInicio($finicio);
        $actividad->setFechaFin($ffin);
        $actividad->setDescripcion($descripcion);
        dump($actividad);

        // Informamos a Doctrine de que queremos guardar (todavía no se ejecuta ninguna query)
        $em->persist($actividad);

        // Para ejecutar las queries pendientes, se utiliza flush().
        $em->flush();

        // 3) redirigir al formulario.
        return $this->redirectToRoute("actividadesFlipBox");
    }
}