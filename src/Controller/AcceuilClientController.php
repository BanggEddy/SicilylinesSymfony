<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AcceuilClientController extends AbstractController
{
    #[Route('/acceuilclient', name: 'app_acceuil_client')]
    public function index(): Response
    {
        return $this->render('acceuil_client/index.html.twig', [
            'controller_name' => 'AcceuilClientController',
        ]);
    }
}
