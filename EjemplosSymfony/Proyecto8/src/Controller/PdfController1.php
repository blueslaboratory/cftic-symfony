<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

// ESPACIOS DE NOMBRES DE LA BIBLIOTECA DOMPDF

use Dompdf\Dompdf;
use Dompdf\Options;

class PdfController1 extends AbstractController
{

    // 59 - GENERAR PDF
    // localhost:8000/genererarPDF1
    #[Route('/genererarPDF1', name: 'genererarPDF1')]
    public function genererarPDF1()
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

        // Almacenar datos binarios PDF
        $output = $dompdf->output();

        // En este caso, queremos escribir el archivo en el directorio público.
        $publicDirectory = $this->getParameter('kernel.project_dir') . '/public';
        // concatenamos el nombre del fichero
        $pdfFilepath = $publicDirectory . '/figuras.pdf';

        // gurdamos el archivo en la ruta deseada
        file_put_contents($pdfFilepath, $output);

        // DEvolvemos mensaje de texto
        return new Response("¡pdf guardado correctamente!");
    }
}
