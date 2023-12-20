<?php

namespace App\Controller;

use App\Entity\Produit;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ProductController extends AbstractController
{
    #[Route('/produit/{id}', 'product.index', methods: ['GET', 'POST'])]
    public function product(EntityManagerInterface $manager, int $id): Response
    {
        // Récupérer le produit à partir de l'identifiant
        $produit = $manager->getRepository(Produit::class)->find($id);

        return $this->render('product/index.html.twig', [
            'produit' => $produit,
        ]);
    }
}
