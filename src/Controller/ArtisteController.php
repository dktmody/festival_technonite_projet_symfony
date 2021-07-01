<?php

namespace App\Controller;

use App\Entity\Artiste;
use App\Repository\ArtisteRepository;
use App\Repository\CategorieRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ArtisteController extends AbstractController
{
    /**
     * @Route("/artistes", name="artiste")
     * @Route("/artistes/category/{id}", name="liste_categoryById", requirements={"id"="\d+"})
     */
    public function index(CategorieRepository $categorieRepository, ArtisteRepository $artisteRepository, $id = null): Response
    {
        $categories = $categorieRepository->findAll();

        $artistes = $id ? $artisteRepository->findBy(['category' => $id]) :  $artisteRepository->findAll();
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
