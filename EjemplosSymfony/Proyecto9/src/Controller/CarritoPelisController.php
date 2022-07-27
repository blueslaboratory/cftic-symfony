<?php

namespace App\Controller;

use App\Entity\Generos;
use App\Repository\GenerosRepository;
use App\Entity\Peliculas;
use App\Repository\PeliculasRepository;

use Doctrine\ORM\EntityManagerInterface;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CarritoPelisController extends AbstractController
{
    //localhost:8000/generos
    #[Route('/generos', name: 'generos')]
    public function generos(Request $request, EntityManagerInterface $em)
    {
        $generos = $em->getRepository(Generos::class)->findAll();

        //dump($generos);

        return $this->render('generos/generos.html.twig', [
            'generos' => $generos,
        ]);
    }

    //localhost:8000/peliculas
    #[Route('/peliculas', name: 'peliculas')]
    public function peliculas(Request $request, EntityManagerInterface $em)
    {
        $generos = $em->getRepository(Generos::class)->findAll();

        $datoget = intval($request->query->get('id'));
        $peliculas = $em->getRepository(Peliculas::class)->findByIdgenero($datoget);

        //dump($peliculas);

        return $this->render('peliculas/peliculas.html.twig', [
            'generos' => $generos,
            'peliculas' => $peliculas,
        ]);
    }

    //localhost:8000/carrito
    #[Route('/carrito', name: 'carrito')]
    public function carrito(Request $request, EntityManagerInterface $em)
    {
        $compras = $request->request->all('peliculas');
        dump($compras);

        $datoQuery='';

        foreach ($compras as $c) {
            $datoQuery .= ($c . ',');
        }

        $datoQuery=substr($datoQuery, 0, strlen($datoQuery)-1); 
        dump($datoQuery);

        $query = $em->createQuery('SELECT c AS cesta FROM App\Entity\Peliculas p 
                                   WHERE c.idpelicula IN($datoQuery)');
        // nunca en un in se le puede meter un parametro, a nivel general
        // $query->setParameter('d', $datoQuery);
        dump($query);
        $compras = $query->getResult();
        dump($compras);

        return $this->render('peliculas/carrito.html.twig', [
            'compras' => $compras,
        ]);
    }
}
