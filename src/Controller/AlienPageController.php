<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class AlienPageController extends AbstractController
{
    /**
     * @Route("/alienpage", name="alien_page")
     */
    public function index()
    {
        return $this->render('alien_page/index.html.twig', [
            'controller_name' => 'AlienPageController',
        ]);
    }
}
