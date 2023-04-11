<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Client;
use App\Entity\Reservation;

class ConnectionController extends AbstractController
{
    #[Route('/connection', name: 'app_connection')]
    public function index(Request $request): Response
    {
        if ($request->isMethod('POST')) {
            $email = $request->request->get('_email');
            $mdp = $request->request->get('_mdp');

            $client = $this->getDoctrine()
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

    #[Route('/reservation/{id}', name: 'app_reservation_new')]
    public function reservation($id): Response
    {
        $client = $this->getDoctrine()
            ->getRepository(Client::class)
            ->find($id);

        if (!$client) {
            throw $this->createNotFoundException('Client non trouvé');
        }

        $reservations = $client->getReservations();

        return $this->render('reservation/index.html.twig', [
            'reservations' => $reservations,
        ]);
    }
}
