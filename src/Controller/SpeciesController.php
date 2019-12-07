<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SpeciesController extends AbstractController
{
    /**
     * @Route("/species", name="species")
     */
    public function index()
    {
        return $this->render('species/index.html.twig', [
            'controller_name' => 'SpeciesController',
        ]);
    }
}
