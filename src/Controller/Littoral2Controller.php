<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class Littoral2Controller extends AbstractController
{
    /**
     * @Route("/littoral2", name="littoral2")
     */
    public function index()
    {
        return $this->render('littoral2/index.html.twig', [
            'controller_name' => 'Littoral2Controller',
        ]);
    }
}
