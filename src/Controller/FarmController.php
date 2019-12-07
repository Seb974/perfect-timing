<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class FarmController extends AbstractController
{
    /**
     * @Route("/farm", name="farm")
     */
    public function index()
    {
        return $this->render('farm/index.html.twig', [
            'controller_name' => 'FarmController',
        ]);
    }
}
