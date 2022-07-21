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

class ActividadesController extends AbstractController
{
    // localhost:8000/actividades
    #[Route('/actividades', name: 'actividades')]
    public function actividades(): Response
    {
        return $this->render('actividades/actividades.html.twig', [
        ]);
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


    // localhost:8000/actividadesFlipBox
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
        
        
        $actividades = $em->getRepository(Actividades::class)->findAll();
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
        dump($actividades);
        

        return $this->render('actividades/actividadesFlipBox.html.twig', [
            'distritos' => $distritos,
            'actividades' => $actividades,
            'seleccionado' => $distrito
        ]);
    }

}