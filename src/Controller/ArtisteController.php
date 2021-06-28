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
        
        // dd($artistes);
        return $this->render('artiste/index.html.twig', [
            'categories' => $categories,
            'artistes' => $artistes,
        ]);
    }

    
}
