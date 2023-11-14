<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Client;
use App\Entity\Reservation;
use Doctrine\Persistence\ManagerRegistry;

class ConnectionController extends AbstractController
{
    private $doctrine;

    public function __construct(ManagerRegistry $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    #[Route('/connection', name: 'app_connection')]
    public function index(Request $request): Response
    {
        if ($request->isMethod('POST')) {
            $email = $request->request->get('_email');
            $mdp = $request->request->get('_mdp');

            // Utilisation de l'injection de dépendance pour obtenir le gestionnaire d'entités
            $entityManager = $this->doctrine->getManager();

            $client = $entityManager
                ->getRepository(Client::class)
                ->findOneBy(['email' => $email, 'mdp' => $mdp]);

            if ($client) {
                return $this->redirectToRoute('acceuilclient', ['id' => $client->getId()]);
            } else {
                $this->addFlash('error', 'Les informations de connexion sont incorrectes.');
            }
        }

        return $this->render('connection/index.html.twig');
    }

}
