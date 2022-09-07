<?php

/*
22/06/2022
23/06/2022
localhost:8000/lenguajes
localhost:8000/parametros

CTRL D -> selecciona las ocurrencias subrayadas por el raton para despues sustituirlas
*/

// namespace = package
namespace App\Controller;

// use = import
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\Routing\Annotation\Route;


class MainController extends AbstractController
{
    // C:\Users\W10Alex\Desktop\CFTIC\EjemplosSymfony\Proyecto2> php -S localhost:8000 -t public/
    // localhost:8000/lenguajes
    // Anotacion o decoracion, se le suele dar un name para llamarla a traves de otra funcion
    #[Route('/lenguajes', name: 'vistaPrincipal')]
    public function vistaPrincipal()
    {
        // $this hace referencia a la instancia de mi propia clase, vete a la funcion render de mi clase (heredada de AbstractController)
        return $this->render('lenguajes/inicio.html.twig');
    }


    #[Route('/java', name: 'java')]
    public function vistaJava()
    {
        return $this->render('lenguajes/java.html.twig');
    }

    #[Route('/php', name: 'php')]
    public function vistaPHP()
    {
        return $this->render('lenguajes/php.html.twig');
    }

    #[Route('/python', name: 'python')]
    public function vistaPython()
    {
        return $this->render('lenguajes/python.html.twig');
    }

    #[Route('/thanks', name: 'thanks')]
    public function vistaThankYou()
    {
        return $this->render('lenguajes/thanks.html.twig');
    }


    // => operador de asignacion
    // -> llama a una funcion
    // localhost:8000/parametros
    #[Route('/parametros', name: 'datos')]
    public function datos()
    {
        $minombre = 'Benito';
        $miapellido = 'Floro';
        return $this->render('deportes/entrenador.html.twig', [
            'nombre' => $minombre,
            'apellido' => $miapellido
        ]);
    }


    // localhost:8000/coleccion
    #[Route('/coleccion', name: 'colecciones')]
    public function colecciones()
    {
        $misjugadores = [
            [
                'nombre' => 'Vinicius',
                'apellido' => 'Júnior'
            ],
            [
                'nombre' => 'Eduardo',
                'apellido' => 'Camavinga'
            ],
            [
                'nombre' => 'Thibaut',
                'apellido' => 'Courtois'
            ],
            [
                'nombre' => 'Federico',
                'apellido' => 'Valverde'
            ],
        ];

        return $this->render('deportes/jugadores.html.twig', [
            'jugadores' => $misjugadores
        ]);
    }


    // localhost:8000/datalist
    #[Route('/datalist', name: 'datalist')]
    public function datalist()
    {
        $nombres = ['Ana','Adrian','Maria','Lucia','Maite','Silvia','Gema','Carlos','Pedro','Javier','Antonio','Oscar'];
        sort($nombres);

        return $this->render('datalist/datalist.html.twig', [
            'nombres' => $nombres
        ]);
    }


    // localhost:8000/pelis
    #[Route('/pelis', name: 'peliculas')]
    public function peliculas()
    {
        $dirImagenes = scandir("peliculas");
        $titulos = $dirImagenes;
        $countImages = count($dirImagenes);
        dump($dirImagenes);

        for ($i=0; $i < $countImages; $i++) { 
            // offset -1 para que se vaya al final
            if(substr(($titulos[$i]), -1)!= '.'){
                $titulos[$i] = str_replace('.jpg', '', strtolower($dirImagenes[$i]));
                $titulos[$i] = ucwords(str_replace('_', ' ', $titulos[$i]));
            }            
        }
        dump($titulos);

        
        $pelis = [
            
            [
                'titulo' =>'Abre los ojos',
                'imagen' =>'peliculas/ABRE_LOS_OJOS.jpg'
            ],
            [
                'titulo' =>'Cadena Perpetua',
                'imagen' =>'peliculas/Cadena_Perpetua.jpg'
            ],
            [
                'titulo' =>'Matrix',
                'imagen' =>'peliculas/Matrix.jpg'
            ],
            [
                'titulo' =>'Mejor imposible',
                'imagen' =>'peliculas/Mejor_Imposible.jpg'
            ],
            
        ];

        return $this->render('peliculas/listado.html.twig',[
            'pelis' => $pelis,
            'dirImagenes' => $dirImagenes,
            'titulos' => $titulos,
            'length' => $countImages
        ]);
    }

}