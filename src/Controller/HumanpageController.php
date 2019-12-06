<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HumanpageController extends AbstractController
{
    /**
     * @Route("/humanpage", name="humanpage")
     */
    public function index()
    {
        return $this->render('humanpage/index.html.twig', [
            'controller_name' => 'HumanpageController',
        ]);
    }
}
