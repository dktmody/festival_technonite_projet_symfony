<?php

namespace App\Controller;

use App\Entity\Artiste;
use App\Repository\ArtisteRepository;
use App\Repository\CategorieRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

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

    /**
     * @Route("/artiste/view/{id}", name="artiste_view", requirements={"id"="\d+"})
     */
    public function view(Artiste $artiste, ArtisteRepository $artisteRepository): Response
    {      
        $artisteId = $artiste->getId();
        $artiste = $artisteRepository->find($artisteId);

        return $this->render('artiste/view.html.twig', [
            'artiste' => $artiste,
        ]);
    }  
}
