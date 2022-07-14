<?php

namespace App\Controller;

use App\Entity\Emp;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

// Paginacion
use Knp\Component\Pager\PaginatorInterface;

class PaginacionController extends AbstractController
{
    
    // localhost:8000/paginacion
    #[Route('/paginacion', name: 'paginar')]
    public function paginar(Request $request, PaginatorInterface $paginator, EntityManagerInterface $em)
    {
        $query = $em->getRepository(Emp::class)->findAll();

        // Paginar los resultados de la consulta
        $datosPaginados = $paginator->paginate(
            // Consulta sin ejecutar
            $query,
            // Definir el parámetro de la página recogida por GET
            $request->query->getInt('page', 1),
            // Número de elementos por página
            5
        );

        return $this->render('paginacion/paginacion.html.twig', [
            'datosP' => $datosPaginados
        ]);
    }
}
