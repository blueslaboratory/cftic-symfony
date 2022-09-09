<?php

namespace App\Controller;

use App\Entity\Localizacion;
use App\Entity\Pupilos;
use App\Form\RegistrationFormType;
use App\Security\AppCustomAuthenticator;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\UserAuthenticatorInterface;
use DateTime;

use Symfony\Component\Security\Core\Security;

class RegistrationController extends AbstractController
{
    #[Route('/register', name: 'app_register')]
    public function register(Request $request, UserPasswordHasherInterface $userPasswordHasher, UserAuthenticatorInterface $userAuthenticator, AppCustomAuthenticator $authenticator, EntityManagerInterface $entityManager): Response
    {
        $user = new Pupilos();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $user->setNick(
                $form->get('nick')->getData()
            );

            $user->setEmail(
                $form->get('email')->getData()
            );

            $user->setTelefono(
                $form->get('telefono')->getData()
            );
/*
            $user->setDistrito(
                $form->get('distrito')->getData()
            );
*/
            // encode the plain password
            $user->setPassword(
                $userPasswordHasher->hashPassword(
                    $user,
                    $form->get('plainPassword')->getData()
                )
            );

            $entityManager->persist($user);
            $entityManager->flush();
            // do anything else you need here, like send an email

            return $userAuthenticator->authenticateUser(
                $user,
                $authenticator,
                $request
            );
        }

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
        ]);
    }

    // localhost:8000/editarRegistro
    #[Route('/editarRegistro', name: 'editarRegistro')]
    public function editarRegistro(Security $security, EntityManagerInterface $em)
    {
        $pupilo = $security->getUser();
        dump($pupilo);

        //$pupilo = $em->getRepository(Pupilos::class)->find($id);
        //$pupilo1 = new Pupilos();
        //$pupilo1 = $pupilo;
        //dump($pupilo1->getDistrito());

        $municipio = 'MADRID';
        $query = $em->createQuery('SELECT DISTINCT(l.distrito) AS distrito FROM App\Entity\Localizacion l 
                                   WHERE l.municipio = :m ORDER BY distrito ASC');
        $query->setParameter('m', $municipio);
        $distritos = $query->getResult();
        // var_dump($distritos);


        // add select para coger el distrito del pupilo
        // $query = $em->createQuery('SELECT DISTINCT(p.distrito) AS distrito FROM App\Entity\Pupilos p 
        //                            WHERE p.nick = :n');
        // $query->setParameter('n', $pupilo);
        // dump($pupilo);
        // dump($query);
        // $distrito = $query->getResult();
        // dump($distrito);

        

        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        return $this->render('registration/editarRegistro.html.twig', [
            'mensaje' => null,
            'distritos' => $distritos,
            'pupilo' => $pupilo
        ]);
    }
    
    // localhost:8000/modificarRegistro
    #[Route('/modificarRegistro', name: 'modificarRegistro')]
    public function modificarRegistro(Request $request, EntityManagerInterface $em, UserPasswordHasherInterface $userPasswordHasher,)
    {
        // Podemos obtener el EntityManager a través de inyección de dependencias con el argumento EntityManagerInterface $em
        // 1) recibir datos del formulario
        $id = intval($request->request->get('txtId'));
        //dump($id);
        $nick = $request->request->get('txtNick');
        //dump($nick);
        $email = $request->request->get('txtEmail');
        //dump($email);
        $telefono = $request->request->get('txtPhone');
        //dump($telefono);
        $password = $request->request->get('txtPassword');
        //dump($password);
        $nombre = $request->request->get('txtNombre');
        //dump($nombre);
        $apellidos = $request->request->get('txtApellidos');
        //dump($apellidos);
        $fnac = $request->request->get('txtFnac');
        //dump($fnac);
        $date = new DateTime($fnac);
        //dump($date);
        $municipio = $request->request->get('txtMunicipio');
        //dump($municipio);
        $distrito = $request->request->get('txtDistrito');
        //dump($distrito);
        $descripcion = $request->request->get('txtDescripcion');
        //dump($descripcion);
        

        /*
        Con foreign keys, seria algo asi pero no funciona

        $localizacion = new Localizacion();

        $municipio_string = $request->request->get('txtMunicipio');
        $localizacion->setMunicipio($municipio_string);
        dump($localizacion);

        $distrito_string = $request->request->get('txtDistrito');
        $localizacion->setDistrito($distrito_string);
        dump($localizacion);
        */

        
        $pupilo = $em->getRepository(Pupilos::class)->find($id);

        $pupilo->setNick($nick);
        $pupilo->setEmail($email);
        $pupilo->setTelefono($telefono);        
        $pupilo->setPassword(
            $userPasswordHasher->hashPassword(
                $pupilo,
                $password
            )
        );
        $pupilo->setNombre($nombre);
        $pupilo->setApellidos($apellidos);
        $pupilo->setFnac($date);
        $pupilo->setMunicipio($municipio);
        $pupilo->setDistrito($distrito);
        $pupilo->setDescripcion($descripcion);
        
        // Con FKs (pero no funciona)
        //$pupilo->setMunicipio($localizacion);
        //$pupilo->setDistrito($localizacion);
        
        // Con FKs persist lo mete en la DB de localizacion despues, yo lo que quiero es seleccionarlo de una DB
        // $em->persist($localizacion);
        $em->persist($pupilo);
        
        
        // Para ejecutar las queries pendientes, se utiliza flush().
        $em->flush();


        // Coger los distritos:
        $municipio = 'MADRID';
        $query = $em->createQuery('SELECT DISTINCT(l.distrito) AS distrito FROM App\Entity\Localizacion l 
                                   WHERE l.municipio = :m ORDER BY distrito ASC');
        $query->setParameter('m', $municipio);
        $distritos = $query->getResult();
        

        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        //return $this->redirectToRoute("editarRegistro");
        return $this->render('registration/editarRegistro.html.twig', [
            'mensaje' => 'Datos editados correctamente',
            'pupilo' => $pupilo,
            'distritos' => $distritos
        ]);
    }
    
}