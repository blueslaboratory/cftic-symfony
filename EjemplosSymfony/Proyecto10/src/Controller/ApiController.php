<?php

namespace App\Controller;

use App\Entity\Dept;
use App\Repository\DeptRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;

// 68 CONSUMO WEB API ACCEDO A DATOS
// 69 - CONSUMO WEB API STAR WARS
// 70 - CONSUMO WEB API COMUNIDAD DE MADRID
// 71 - CONSUMO WEB API PELÍCULAS

class ApiController extends AbstractController
{

    // localhost:8000/consumoapi
    #[Route('/consumoapi', name: 'consumoapi')]
    public function consumoapi(Request $request)
    {
        $datos = file_get_contents("https://apiempleadospgs.azurewebsites.net/api/Empleados");
        $empleados = json_decode($datos, true);

        // Cuando es true, los objects JSON devueltos serán convertidos a array asociativos, 
        // Cuando es false los objects JSON devueltos serán convertidos a objects.

        return $this->render('api/apiIndex.html.twig', [
            'datosEmp' => $empleados
        ]);
    }


    // localhost:8000/apiStarWars
    #[Route('/apiStarWars', name: 'apiStarWars')]
    public function apiStarWars(Request $request)
    {
        $datos = file_get_contents("https://swapi.dev/api/people");
        $guerreros = json_decode($datos, true);

        // Cuando es true, los objects JSON devueltos serán convertidos a array asociativos, 
        // Cuando es false los objects JSON devueltos serán convertidos a objects.

        dump($guerreros['results']);

        return $this->render('api/apiStarWars.html.twig', [
            'guerreros' => $guerreros['results']
        ]);
    }


    // localhost:8000/apiCentrosDia
    #[Route('/apiCentrosDia', name: 'apiCentrosDia')]
    public function apiCentrosDia(Request $request)
    {
        $datos = file_get_contents("https://datos.madrid.es/egob/catalogo/200342-0-centros-dia.json");
        $centros = json_decode($datos, true);

        // Cuando es true, los objects JSON devueltos serán convertidos a array asociativos, 
        // Cuando es false los objects JSON devueltos serán convertidos a objects.

        dump($centros);
        dump($centros['@graph']);

        return $this->render('api/apiCentrosDia.html.twig', [
            'centros' => $centros['@graph']
        ]);
    }


    // localhost:8000/apiBuscadorPeliculas
    #[Route('/apiBuscadorPeliculas', name: 'apiBuscadorPeliculas')]
    public function apiBuscadorPeliculas(Request $request)
    {

        $titulo = $request->request->get('titulo');
        $url = 'https://servicioapipeliculas.azurewebsites.net/api/peliculastitulo/';
        $newUrl = $url . $titulo;

        dump($titulo);
        dump($newUrl);

        if(empty($titulo)){
            $newUrl = "https://servicioapipeliculas.azurewebsites.net/api/Peliculas";
        } 

        dump($newUrl);

        $datos = file_get_contents($newUrl);
        $peliculas = json_decode($datos, true);

        // Cuando es true, los objects JSON devueltos serán convertidos a array asociativos, 
        // Cuando es false los objects JSON devueltos serán convertidos a objects.

        dump($peliculas);

        return $this->render('api/apiPeliculas.html.twig', [
            'peliculas' => $peliculas
        ]);
    }
}
