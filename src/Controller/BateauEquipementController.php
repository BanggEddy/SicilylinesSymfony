<?php

namespace App\Controller;

use App\Entity\BateauEquipement;
use App\Form\BateauEquipementType;
use App\Repository\BateauEquipementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/bateauequipement')]
class BateauEquipementController extends AbstractController
{
    #[Route('/', name: 'app_bateau_equipement_index', methods: ['GET'])]
    public function index(BateauEquipementRepository $bateauEquipementRepository): Response
    {
        return $this->render('bateau_equipement/index.html.twig', [
            'bateau_equipements' => $bateauEquipementRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'app_bateau_equipement_new', methods: ['GET', 'POST'])]
    public function new(Request $request, BateauEquipementRepository $bateauEquipementRepository): Response
    {
        $bateauEquipement = new BateauEquipement();
        $form = $this->createForm(BateauEquipementType::class, $bateauEquipement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $bateauEquipementRepository->save($bateauEquipement, true);

            return $this->redirectToRoute('app_bateau_equipement_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('bateau_equipement/new.html.twig', [
            'bateau_equipement' => $bateauEquipement,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_bateau_equipement_show', methods: ['GET'])]
    public function show(BateauEquipement $bateauEquipement): Response
    {
        return $this->render('bateau_equipement/show.html.twig', [
            'bateau_equipement' => $bateauEquipement,
        ]);
    }

    #[Route('/{id}/edit', name: 'app_bateau_equipement_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, BateauEquipement $bateauEquipement, BateauEquipementRepository $bateauEquipementRepository): Response
    {
        $form = $this->createForm(BateauEquipementType::class, $bateauEquipement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $bateauEquipementRepository->save($bateauEquipement, true);

            return $this->redirectToRoute('app_bateau_equipement_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('bateau_equipement/edit.html.twig', [
            'bateau_equipement' => $bateauEquipement,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_bateau_equipement_delete', methods: ['POST'])]
    public function delete(Request $request, BateauEquipement $bateauEquipement, BateauEquipementRepository $bateauEquipementRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$bateauEquipement->getId(), $request->request->get('_token'))) {
            $bateauEquipementRepository->remove($bateauEquipement, true);
        }

        return $this->redirectToRoute('app_bateau_equipement_index', [], Response::HTTP_SEE_OTHER);
    }
}
