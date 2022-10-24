<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CategoriesRepository;
use App\Repository\ProduitsRepository;
use Symfony\Component\HttpFoundation\Request;

class MainController extends AbstractController
{
    #[Route('/', name: 'app_main')]
    public function index(CategoriesRepository $CategoriesRepository): Response
    {
        $categories =  $CategoriesRepository->findAll();
        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
            'categories' => $categories,
        ]);
    }

    #[Route('/categorie/{id}', name: 'app_categories_details', methods: ['GET', 'POST'])]
    public function categories(Request $request, $id, ProduitsRepository $ProduitsRepository): Response
    {
        $produits =  $ProduitsRepository->findBy(array('categorie'=>$id));
        return $this->render('main/categories.html.twig', [
    
            'produits' => $produits,
        ]);
    }

    #[Route('/produit/{id}', name: 'app_produits_details', methods: ['GET', 'POST'])]
    public function produit(Request $request, $id, ProduitsRepository $ProduitsRepository): Response
    {
        $produits =  $ProduitsRepository->findBy(array('id'=>$id));
        return $this->render('main/produit.html.twig', [
            'produits' => $produits,
        ]);
    }
}
