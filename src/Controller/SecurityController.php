<?php

namespace SecurityController;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SecurityController extends AbstractController
{
    #[Route('/connexion', name: 'app_security.login', methods: ['GET', 'POST'])]
    public function login(AuthenticationUtils $authenticationUtils ): Response
    {
        return $this->render('security/login.html.twig', [
            'last_username' => $authenticationUtils->getLastUsername(),
            'error' => $authenticationUtils->getLastAuthenticationError(),
        ]);
    }
    
    #[Route('/deconnexion', 'app_security.logout')]
    public function logout(){}

    #[Route('/inscription', 'app_security.registration', methods: ['GET', 'POST'])]
    public function registration(Request $request, EntityManagerInterface $manager, UserPasswordHasherInterface $passwordHasher) : Response
    {
        $user = new Utilisateur();
        $user->setRoles(['ROLE_USER']);
        $form = $this->createForm(RegistrationType::class, $user);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()){
            $user = $form->getData();
            $plainPassword = $form->get('password')->getData();
            $hashPassword = $passwordHasher->hashPassword(
                $user,
                $plainPassword
            );
            $user->setPassword($hashPassword);
            $this->addFlash(
                'success',
                'Votre Compte a été créé avec succès'
            );

            $manager->persist($user);
            $manager->flush();

            return $this->redirectToRoute('app_security.login');
        }
        return $this->render('security/registration.html.twig', [
            'form' => $form->createView()
        ]);
    }
}