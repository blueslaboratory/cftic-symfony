<?php

namespace App\Controller;

use App\Entity\Generos;
use App\Entity\Peliculas;

use Doctrine\ORM\EntityManagerInterface;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CarritoPelisController extends AbstractController
{
    //67 - Cesta Symfony

    //localhost:8000/limpiarSesion
    #[Route('/limpiarSesion', name: 'limpiarSesion')]
    public function limpiarSesion(Request $request)
    {
        $session = $request->getSession();
        $session->clear();

        return $this->redirectToRoute('generos');
    }

    //localhost:8000/generos
    #[Route('/generos', name: 'generos')]
    public function generos(Request $request, EntityManagerInterface $em)
    {
        // Creando la sesion
        $session = $request->getSession();

        //Comprobamos que si ya existe la variable stringGlobalCesta
        if ((!$session->has("stringGlobalCesta"))) {
            //Si no existe creamos un string nuevo
            $stringIdsCesta = '';
        } else {
            //Si existe lo recuperamos de la sesión
            $stringIdsCesta = $session->get("stringGlobalCesta");
        }

        // Cogiendo todos los generos de la DB
        $generos = $em->getRepository(Generos::class)->findAll();
        //dump($generos);

        return $this->render('generos/generos.html.twig', [
            'generos' => $generos,
            'stringIdsCesta' => $stringIdsCesta,
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

    //localhost:8000/addPeliculaCarrito
    #[Route('/addPeliculaCarrito', name: 'addPeliculaCarrito')]
    public function addPeliculaCarrito(Request $request, EntityManagerInterface $em)
    {

        // cogemos los ids
        $compras = $request->request->all('peliculas');
        dump($compras);

        $datoQuery = '';

        // los hacemos un string para la query
        foreach ($compras as $c) {
            $datoQuery .= ($c . ',');
        }

        // Sesiones bro:
        $session = $request->getSession();

        if ((!$session->has("stringGlobalCesta"))) {
            //Si no existe la variable de sesion la creamos y añadimos el ojeto String
            $stringIdsCesta = '';
            $stringIdsCesta = $datoQuery;
        } else {
            //Si existe recuperamos el String le añadimos el nuevo objeto String
            $stringIdsCesta = $session->get("stringGlobalCesta");
            $stringIdsCesta .= $datoQuery;
        }

        //Actualizar variable de sesión
        $session->set("stringGlobalCesta", $stringIdsCesta);

        //Recuperar las variable de sesión 
        $stringIdsCesta = $session->get("stringGlobalCesta");
        dump('$stringGlobalCesta: ', $stringIdsCesta);


        return $this->redirectToRoute('generos');
    }


    //localhost:8000/verCarrito
    #[Route('/verCarrito', name: 'verCarrito')]
    public function verCarrito(Request $request, EntityManagerInterface $em)
    {

        // Sesiones bro:
        $session = $request->getSession();

        if ((!$session->has("stringGlobalCesta"))) {
            //Si no existe la variable de sesion la creamos 
            $stringIdsCesta = '';
        } else {
            //Si existe recuperamos el String 
            $stringIdsCesta = $session->get("stringGlobalCesta");
        }

        // quitamos la última coma
        $datoQuerySinUltimaComa = substr($stringIdsCesta, 0, strlen($stringIdsCesta) - 1);
        dump($stringIdsCesta);

        // un select con un IN nunca va a mostrar los repetidos
        // si quieres repetidos crear una clase a parte con los numeros repetidos
        $query = $em->createQuery('SELECT p AS pelicula FROM App\Entity\Peliculas p 
                                   WHERE p.idpelicula IN(' . $datoQuerySinUltimaComa . ')');
        // nunca en un in se le puede meter un parametro, a nivel general
        // $query->setParameter('d', $datoQuery);
        dump($query);
        $compras = $query->getResult();
        dump($compras);


        // coger el precio:
        $precioTotal = 0;
        foreach ($compras as $c) {
            // 'pelicula' viene de la createQuery
            $precioTotal += $c['pelicula']->getPrecio();
        }

        return $this->render('peliculas/carrito.html.twig', [
            'cesta' => $compras,
            'precioTotal' => $precioTotal,
            'stringIdsCesta' => $stringIdsCesta
        ]);
    }

}
