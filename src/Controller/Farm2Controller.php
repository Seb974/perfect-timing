<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class Farm2Controller extends AbstractController
{
    /**
     * @Route("/farm2", name="farm2")
     */
    public function index()
    {
        return $this->render('farm2/index.html.twig', [
            'controller_name' => 'Farm2Controller',
        ]);
    }
}
