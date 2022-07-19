<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

// ESPACIOS DE NOMBRES DE LA BIBLIOTECA DOMPDF

use Dompdf\Dompdf;
use Dompdf\Options;

class PdfController extends AbstractController
{

    // 59 - GENERAR PDF
    // localhost:8000/genererarPDF
    #[Route('/genererarPDF', name: 'genererarPDF')]
    public function genererarPDF()
    {
        // Existen muchas configuraciones para Dompdf. Incluimos una de las muchas que tiene
        // por ejemplo asignar el tipo de letra
        $pdfOptions = new Options();
        $pdfOptions->set('defaultFont', 'Arial');

        // Crea una instancia de Dompdf con nuestras opciones
        $dompdf = new Dompdf($pdfOptions);

        // Preparamos la página HTML para generar PDF
        $html = $this->renderView('figurasPDF/figurasPDF.html.twig', [
            'autor' => "Benito Floro"
        ]);

        // Ahora se carga la página HTML en Dompdf
        $dompdf->loadHtml($html);

        // También podemos de forma opcional indicar el tamaño del papel y la orientación
        $dompdf->setPaper('A4', 'portrait');

        // Renderiza el HTML como PDF
        $dompdf->render();

        // Envíe el PDF generado al navegador. ¡DESCARGA FORZADA!
        $dompdf->stream("figuras.pdf", [
            // "Attachment" => true
            // al ponerlo a false no hay descarga forzada
            "Attachment" => false
        ]);
    }
}
