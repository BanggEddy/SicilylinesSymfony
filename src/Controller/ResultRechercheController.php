<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Traversee;

class ResultRechercheController extends AbstractController
{
    /**
     * @Route("/recherche", name="recherche")
     */
    public function index(Request $request)
    {
        $searchTerm = $request->query->get('search');

        // Récupérer les traversées de l'utilisateur avec la méthode findBy de Doctrine
        $traversees = $this->getDoctrine()
            ->getRepository(Traversee::class)
            ->findBy([
                'id' => $searchTerm,
            ]);

        return $this->render('resultrecherche/index.html.twig', [
            'traversees' => $traversees,
        ]);
    }
}
