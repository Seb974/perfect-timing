<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class Green2Controller extends AbstractController
{
    /**
     * @Route("/green2", name="green2")
     */
    public function index()
    {
        return $this->render('green2/index.html.twig', [
            'controller_name' => 'Green2Controller',
        ]);
    }
}
