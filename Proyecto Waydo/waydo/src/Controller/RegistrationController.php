<?php

namespace App\Controller;

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
use Symfony\Contracts\Translation\TranslatorInterface;

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
    public function editarRegistro(Request $request, EntityManagerInterface $em, Security $security)
    {
        $pupilo = $security->getUser();
        dump($pupilo);
        return $this->render('registration/editarRegistro.html.twig', [
            'pupilo' => $pupilo
        ]);
    }
    /*
    // localhost:8000/modificarRegistro
    #[Route('/modificarRegistro', name: 'modificarRegistro')]
    public function modificarRegistro(Request $request, EntityManagerInterface $em)
    {
        // Podemos obtener el EntityManager a través de inyección de dependencias con el argumento EntityManagerInterface $em
        // 1) recibir datos del formulario
        $identificador = intval($request->request->get('txtId'));
        dump($identificador);
        $nombre = $request->request->get('txtNombre');
        dump($nombre);
        $loc = $request->request->get('txtLoc');
        dump($loc);

        $departamento = $em->getRepository(Dept::class)->find($identificador);

        $departamento->setDnombre($nombre);
        $departamento->setLoc($loc);

        $em->persist($departamento);
        // Para ejecutar las queries pendientes, se utiliza flush().

        $em->flush();

        return $this->redirectToRoute("editarRegistro");
    }
    */
}