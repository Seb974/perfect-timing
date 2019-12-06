<?php

namespace App\Controller;

use App\Entity\EcoLevel;
use App\Form\EcoLevelType;
use App\Repository\EcoLevelRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/eco/level")
 */
class EcoLevelController extends AbstractController
{
    /**
     * @Route("/", name="eco_level_index", methods={"GET"})
     */
    public function index(EcoLevelRepository $ecoLevelRepository): Response
    {
        return $this->render('eco_level/index.html.twig', [
            'eco_levels' => $ecoLevelRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="eco_level_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $ecoLevel = new EcoLevel();
        $form = $this->createForm(EcoLevelType::class, $ecoLevel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($ecoLevel);
            $entityManager->flush();

            return $this->redirectToRoute('eco_level_index');
        }

        return $this->render('eco_level/new.html.twig', [
            'eco_level' => $ecoLevel,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="eco_level_show", methods={"GET"})
     */
    public function show(EcoLevel $ecoLevel): Response
    {
        return $this->render('eco_level/show.html.twig', [
            'eco_level' => $ecoLevel,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="eco_level_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, EcoLevel $ecoLevel): Response
    {
        $form = $this->createForm(EcoLevelType::class, $ecoLevel);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('eco_level_index');
        }

        return $this->render('eco_level/edit.html.twig', [
            'eco_level' => $ecoLevel,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="eco_level_delete", methods={"DELETE"})
     */
    public function delete(Request $request, EcoLevel $ecoLevel): Response
    {
        if ($this->isCsrfTokenValid('delete'.$ecoLevel->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($ecoLevel);
            $entityManager->flush();
        }

        return $this->redirectToRoute('eco_level_index');
    }
}
