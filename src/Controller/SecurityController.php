<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SecurityController extends AbstractController
{
    #[Route('/connexion', name: 'app_security.login', methods: ['GET', 'POST'])]
    public function login(AuthenticationUtils $authenticationUtils ): Response
    {
        return $this->render('security/login.html.twig', [
            
        ]);
    }
    

    #[Route('/deconnexion', 'app_security.logout')]
    public function logout(){}


    #[Route('/inscription', 'app_security.registration', methods: ['GET', 'POST'])]
    public function registration(Request $request, EntityManagerInterface $manager, UserPasswordHasherInterface $passwordHasher) : Response
    {
        
        return $this->render('security/registration.html.twig', [
            
        ]);
    }
}
