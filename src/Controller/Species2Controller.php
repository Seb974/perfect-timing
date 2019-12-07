<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class Species2Controller extends AbstractController
{
    /**
     * @Route("/species2", name="species2")
     */
    public function index()
    {
        return $this->render('species2/index.html.twig', [
            'controller_name' => 'Species2Controller',
        ]);
    }
}
