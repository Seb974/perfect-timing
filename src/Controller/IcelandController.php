<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class IcelandController extends AbstractController
{
    /**
     * @Route("/iceland", name="iceland")
     */
    public function index()
    {
        return $this->render('iceland/index.html.twig', [
            'controller_name' => 'IcelandController',
        ]);
    }
}
