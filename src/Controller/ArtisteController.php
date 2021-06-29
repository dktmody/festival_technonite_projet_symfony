<?php

namespace App\Controller;

use App\Repository\ArtisteRepository;
use App\Repository\CategorieRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ArtisteController extends AbstractController
{
    /**
     * @Route("/artiste", name="artiste")
     */
    public function index(CategorieRepository $categorieRepository, ArtisteRepository $artisteRepository): Response
    {
        $categories = $categorieRepository->findAll();
        $artistes = $artisteRepository->findAll();
        $categoryColorName = [
            'Mélodique' => 'primary',
            'Industrielle' => 'secondary',
            'Groovy' => 'success',
            'Deep' => 'info',
            'Détroit' => 'warning',
        ];
        foreach($categories as $category){
            $category->color = $categoryColorName[$category->getName()];
        }
        
        // dd($categories);
        return $this->render('artiste/index.html.twig', [
            'categories' => $categories,
            'artistes' => $artistes,
        ]);
    }

    
}
