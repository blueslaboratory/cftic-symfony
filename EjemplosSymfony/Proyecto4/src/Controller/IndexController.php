<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;


class IndexController extends AbstractController
{
    // localhost:8000/indexHospi
    #[Route('/indexHospi', name: 'indexHospi')]
    public function indexHospi()
    {
        return $this->render('indexHospi.html.twig');
    }

}

?>