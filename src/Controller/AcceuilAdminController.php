<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AcceuilAdminController extends AbstractController
{
    #[Route('/acceuiladmin', name: 'app_acceuil_admin')]
    public function index(): Response
    {
        return $this->render('acceuil_admin/index.html.twig', [
            'controller_name' => 'AcceuilAdminController',
        ]);
    }
}
