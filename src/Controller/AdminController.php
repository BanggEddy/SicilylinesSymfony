<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Admin;
use Doctrine\Persistence\ManagerRegistry;

class AdminController extends AbstractController
{
    private $doctrine;

    public function __construct(ManagerRegistry $doctrine)
    {
        $this->doctrine = $doctrine;
    }

    #[Route('/admin')]
    public function index(Request $request): Response
    {
        if ($request->isMethod('POST')) {
            $email = $request->request->get('email');
            $mdp = $request->request->get('mdp');

            // Utilisation de l'injection de dépendance pour obtenir le gestionnaire d'entités
            $entityManager = $this->doctrine->getManager();

            // Utilisation du gestionnaire d'entités pour récupérer l'entité Admin
            $admin = $entityManager
                ->getRepository(Admin::class)
                ->findOneBy(['email' => $email, 'mdp' => $mdp]);

            if ($admin) {
                return $this->redirectToRoute('acceuiladmin', ['id' => $admin->getId()]);
            } else {
                $this->addFlash('error', 'Les informations de connexion sont incorrectes.');
            }
        }

        return $this->render('admin/index.html.twig');
    }
}
