<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Translation\TranslatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class InternacionalizacionController extends AbstractController
{
    // 64 – INTERNACIONALIZACIÓN
    // http://localhost:8000/es/internacionalizacion
    // http://localhost:8000/en/internacionalizacion
    // http://localhost:8000/fr/internacionalizacion

    #[Route('/{_locale}/internacionalizacion', name: 'internacionalizacion',)]

    public function internacionalizacion(Request $request, TranslatorInterface $translator)
    {
        $locale = $request->getLocale();

        //Podríamos recuperarlo por código y enviarlo a la vista
        //$dato = $translator->trans('mensajenombre');

        return $this->render(
            'internacionalizacion/internacionalizacion.html.twig',
            ['idioma' => $locale]
        );
    }
}
