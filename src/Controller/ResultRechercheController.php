<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ResultRechercheController extends AbstractController
{
    #[Route('/result/recherche', name: 'app_result_recherche')]
    public function index(): Response
    {
        return $this->render('result_recherche/index.html.twig', [
            'controller_name' => 'ResultRechercheController',
        ]);
    }
}
