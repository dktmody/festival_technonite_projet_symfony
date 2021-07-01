<?php

namespace App\Controller;

use App\Repository\ArtisteRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class AgendaController extends AbstractController
{
    /**
     * @Route("/agenda", name="agenda")
     */
    public function index(ArtisteRepository $artisteRepository): Response
    {
        return $this->render('agenda/index.html.twig', [
            'controller_name' => 'AgendaController',
            'artistes' => $artisteRepository->findAll(),
        ]);
    }
}
