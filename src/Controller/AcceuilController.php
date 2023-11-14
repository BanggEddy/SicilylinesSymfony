<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AcceuilController extends AbstractController
{
    #[Route('/acceuil')]
    public function index(): Response
    {
        return $this->render('acceuil/index.html.twig', [
            'controller_name' => 'AcceuilController',
        ]);
    }
    

    #[Route('/')]
    public function acceuil(): Response
    {
        return $this->render('acceuil/index.html.twig', [
            'controller_name' => 'AcceuilController',
        ]);
    }
    #[Route('/acceuilclient')]
    public function acceuilclient(): Response
    {
        return $this->render('acceuil_client/index.html.twig', [
            'controller_name' => 'AcceuilClientController',
        ]);
    }
    #[Route('/acceuiladmin')]
    public function acceuiladmin(): Response
    {
        return $this->render('acceuil_admin/index.html.twig', [
            'controller_name' => 'AcceuilAdminController',
        ]);
    }
}

