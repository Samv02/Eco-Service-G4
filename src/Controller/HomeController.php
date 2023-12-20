<?php

// src/Controller/HomeController.php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\ProductFilterType;
use App\Repository\ProduitRepository;

class HomeController extends AbstractController
{
    private $produitRepository;

    public function __construct(ProduitRepository $produitRepository)
    {
        $this->produitRepository = $produitRepository;
    }

    #[Route('/', name: 'app_home')]
    public function index(Request $request): Response
    {
        $marque = $request->query->get('marque');
        $categorie = $request->query->get('categorie');
        $produit = $request->query->get('produit');

        // Use the filter criteria in your repository query
        $products = $this->produitRepository->findByFilterCriteria($marque, $categorie, $produit);

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'products' => $products,
        ]);
    }
}

