<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Admin;

class AdminController extends AbstractController
{
    #[Route('/admin', name: 'app_admin')]
    public function index(Request $request): Response
    {
        if ($request->isMethod('POST')) {
            $email = $request->request->get('email');
            $mdp = $request->request->get('mdp');

            $admin = $this->getDoctrine()
                ->getRepository(Admin::class)
                ->findOneBy(['email' => $email]);

            if ($admin && password_verify($mdp, $admin->getMdp())) {
                return $this->redirectToRoute('acceuiladmin', ['id' => $admin->getId()]);
            } else {
                $this->addFlash('error', 'Les informations de connexion sont incorrectes.');
            }
        }

        return $this->render('admin/index.html.twig');
    }
}
