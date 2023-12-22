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
            'marque' => $marque, // Ajout de ces valeurs pour les utiliser dans les liens
            'categorie' => $categorie, // Ajout de ces valeurs pour les utiliser dans les liens
        ]);
    }

    #[Route('/marque/{id_marque}', name: 'app_filter_by_marque')]
    public function filterByMarque($id_marque, Request $request): Response
    {
        // Retrieve other filter criteria from the request, if needed
        $marque = $request->query->get('marque');
        $categorie = $request->query->get('categorie');
        $produit = $request->query->get('produit');

        $products = $this->produitRepository->findByFilterCriteria($id_marque, $categorie, $produit);

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'products' => $products,
            'marque' => $id_marque,
            'categorie' => $categorie,
        ]);
    }

    #[Route('/categorie/{id_cat}', name: 'app_filter_by_categorie')]
    public function filterByCategorie($id_cat, Request $request): Response
    {
        // Retrieve other filter criteria from the request, if needed
        $marque = $request->query->get('marque');
        $categorie = $request->query->get('categorie');
        $produit = $request->query->get('produit');

        $products = $this->produitRepository->findByFilterCriteria($marque, $id_cat, $produit);

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'products' => $products,
            'marque' => $marque,
            'categorie' => $id_cat,
        ]);
    }
}
