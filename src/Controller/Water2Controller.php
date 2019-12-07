<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class Water2Controller extends AbstractController
{
    /**
     * @Route("/water2", name="water2")
     */
    public function index()
    {
        return $this->render('water2/index.html.twig', [
            'controller_name' => 'Water2Controller',
        ]);
    }
}
