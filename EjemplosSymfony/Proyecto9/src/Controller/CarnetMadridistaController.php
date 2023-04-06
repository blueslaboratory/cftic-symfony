<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CarnetMadridistaController extends AbstractController
{
    // 64 – INTERNACIONALIZACIÓN


    // http://localhost:8000/indexCarnetMadridista
    #[Route('/indexCarnetMadridista', name: 'indexCarnetMadridista',)]
    public function indexCarnetMadridista()
    {
        return $this->render(
            'carnetMadridista/inicioCarnetRM.html.twig',
        );
    }

    // http://localhost:8000/es/carnetMadridista
    // http://localhost:8000/en/carnetMadridista
    #[Route('/{_locale}/carnetMadridista', name: 'carnetMadridista',)]
    public function carnetMadridista(Request $request, TranslatorInterface $translator)
    {
        $locale = $request->getLocale();

        // Podríamos recuperarlo por código y enviarlo a la vista
        //$dato = $translator->trans('mensajenombre');

        return $this->render(
            'carnetMadridista/carnetMadridista.html.twig',
            ['idioma' => $locale]
        );
    }
    
}
