<?php

namespace App\Controller;

use App\Entity\Emp;
use App\Repository\EmpRepository;
use DateTime;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

// ESPACIOS DE NOMBRES DE LA BIBLIOTECA DOMPDF

use Dompdf\Dompdf;
use Dompdf\Options;

class PdfEmpController extends AbstractController
{

    // 60 - INFORME DE EMPLEADOS
    // localhost:8000/indexEmp
    #[Route('/indexEmp', name: 'indexEmp')]
    public function indexEmp(EntityManagerInterface $em)
    {
        $datos = $em->getRepository(Emp::class)->findAll();

        return $this->render('empleadosPDF/empleados.html.twig', [
            'datosEmp' => $datos
        ]);
    }


    // localhost:8000/genererarPdfEmp
    #[Route('/gPdfEmp', name: 'generarPdfEmp')]
    public function genererarPdfEmp(Request $request, EntityManagerInterface $em)
    {
        $datoget = $request->query->get('id');


        dump( $datoget);

        // Existen muchas configuraciones para Dompdf. Incluimos una de las muchas que tiene
        // por ejemplo asignar el tipo de letra
        /*$pdfOptions = new Options();
        $pdfOptions->set('defaultFont', 'Arial');

        // Crea una instancia de Dompdf con nuestras opciones
        $dompdf = new Dompdf($pdfOptions);

        // Coger los datos del empleado
        $datoget = $request->query->get('id');
        dump("sfsdfsdf");
        $datosEmp = $em->getRepository(Emp::class)->findByEmpNo($datoget);
        // hay que convertir el dato a entero porque lo pasa como cadena y empno es un number, castear


        // new DateTime()

        // Preparamos la página HTML para generar PDF
        $html = $this->renderView('empleadosPDF/empleadosPDF.html.twig', [
            'datosEmp' => "ggggggg",
        ]);

        // Ahora se carga la página HTML en Dompdf
        $dompdf->loadHtml($html);

        // También podemos de forma opcional indicar el tamaño del papel y la orientación
        $dompdf->setPaper('A4', 'portrait');

        // Renderiza el HTML como PDF
        $dompdf->render();

        // Envíe el PDF generado al navegador. ¡DESCARGA FORZADA!
        $dompdf->stream("empleados.pdf", [
            // "Attachment" => true
            // al ponerlo a false no hay descarga forzada
            "Attachment" => true
        ]);*/

        return $this->render('empleadosPDF/empleados.html.twig');
    }
}
