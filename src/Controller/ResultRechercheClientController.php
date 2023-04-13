<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Traversee;

class ResultRechercheClientController extends AbstractController
{
    public function index(Request $request)
    {
        $searchTerm = $request->query->get('search');

        // Récupérer les traversées de l'utilisateur avec la méthode findBy de Doctrine
        $traversees = $this->getDoctrine()
            ->getRepository(Traversee::class)
            ->findBy([
                'id' => $searchTerm,
            ]);

        return $this->render('result_recherche_client/index.html.twig', [
            'traversees' => $traversees,
        ]);
    }
}
