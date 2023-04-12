<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Traversee;

class RechercheTraverseeController extends AbstractController
{
    #[Route('/recherchetraversee', name: 'app_recherche_traversee')]
    public function index(): Response
    {
        $traverseeRepository = $this->getDoctrine()->getRepository(Traversee::class);
        $traversees = $traverseeRepository->findAll();
        
        return $this->render('recherche_traversee/index.html.twig', [
            'controller_name' => 'RechercheTraverseeController',
            'traversees' => $traversees,
        ]);
    }
}
