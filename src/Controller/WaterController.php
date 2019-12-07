<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class WaterController extends AbstractController
{
    /**
     * @Route("/water", name="water")
     */
    public function index()
    {
        return $this->render('water/index.html.twig', [
            'controller_name' => 'WaterController',
        ]);
    }
}
