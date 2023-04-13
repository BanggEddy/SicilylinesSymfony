<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Traversee;

class RechercheTraverseeClientController extends AbstractController
{
    #[Route('/recherchetraverseeclient', name: 'app_recherche_traversee_client')]
    public function index(): Response
    {
        $traverseeRepository = $this->getDoctrine()->getRepository(Traversee::class);
        $traversees = $traverseeRepository->findAll();
        
        return $this->render('recherche_traversee_client/index.html.twig', [
            'controller_name' => 'RechercheTraverseeClientController',
            'traversees' => $traversees,
        ]);
    }
}
