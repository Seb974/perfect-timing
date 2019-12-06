<?php

namespace App\Controller;

use App\Entity\HostPlacement;
use App\Form\HostPlacementType;
use App\Repository\HostPlacementRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/host/placement")
 */
class HostPlacementController extends AbstractController
{
    /**
     * @Route("/", name="host_placement_index", methods={"GET"})
     */
    public function index(HostPlacementRepository $hostPlacementRepository): Response
    {
        return $this->render('host_placement/index.html.twig', [
            'host_placements' => $hostPlacementRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="host_placement_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $hostPlacement = new HostPlacement();
        $form = $this->createForm(HostPlacementType::class, $hostPlacement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($hostPlacement);
            $entityManager->flush();

            return $this->redirectToRoute('host_placement_index');
        }

        return $this->render('host_placement/new.html.twig', [
            'host_placement' => $hostPlacement,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="host_placement_show", methods={"GET"})
     */
    public function show(HostPlacement $hostPlacement): Response
    {
        return $this->render('host_placement/show.html.twig', [
            'host_placement' => $hostPlacement,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="host_placement_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, HostPlacement $hostPlacement): Response
    {
        $form = $this->createForm(HostPlacementType::class, $hostPlacement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('host_placement_index');
        }

        return $this->render('host_placement/edit.html.twig', [
            'host_placement' => $hostPlacement,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="host_placement_delete", methods={"DELETE"})
     */
    public function delete(Request $request, HostPlacement $hostPlacement): Response
    {
        if ($this->isCsrfTokenValid('delete'.$hostPlacement->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($hostPlacement);
            $entityManager->flush();
        }

        return $this->redirectToRoute('host_placement_index');
    }
}
