<?php

namespace App\Controller;

use App\Entity\HostPlace;
use App\Form\HostPlaceType;
use App\Repository\HostPlaceRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/host/place")
 */
class HostPlaceController extends AbstractController
{
    /**
     * @Route("/", name="host_place_index", methods={"GET"})
     */
    public function index(HostPlaceRepository $hostPlaceRepository): Response
    {
        return $this->render('host_place/index.html.twig', [
            'host_places' => $hostPlaceRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="host_place_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $hostPlace = new HostPlace();
        $form = $this->createForm(HostPlaceType::class, $hostPlace);
        $form->handleRequest($request);
        $user = $this->getUser();

        if ($form->isSubmitted() && $form->isValid()) {
            $hostPlace->setOwner($user);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($hostPlace);
            $entityManager->flush();

            return $this->redirectToRoute('host_place_index');
        }

        return $this->render('host_place/new.html.twig', [
            'host_place' => $hostPlace,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="host_place_show", methods={"GET"})
     */
    public function show(HostPlace $hostPlace): Response
    {
        return $this->render('host_place/show.html.twig', [
            'host_place' => $hostPlace,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="host_place_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, HostPlace $hostPlace): Response
    {
        $form = $this->createForm(HostPlaceType::class, $hostPlace);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('host_place_index');
        }

        return $this->render('host_place/edit.html.twig', [
            'host_place' => $hostPlace,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="host_place_delete", methods={"DELETE"})
     */
    public function delete(Request $request, HostPlace $hostPlace): Response
    {
        if ($this->isCsrfTokenValid('delete'.$hostPlace->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($hostPlace);
            $entityManager->flush();
        }

        return $this->redirectToRoute('host_place_index');
    }
}
