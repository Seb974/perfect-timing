<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class GreenController extends AbstractController
{
    /**
     * @Route("/green", name="green")
     */
    public function index()
    {
        return $this->render('green/index.html.twig', [
            'controller_name' => 'GreenController',
        ]);
    }
}
