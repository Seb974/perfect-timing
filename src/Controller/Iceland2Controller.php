<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class Iceland2Controller extends AbstractController
{
    /**
     * @Route("/iceland2", name="iceland2")
     */
    public function index()
    {
        return $this->render('iceland2/index.html.twig', [
            'controller_name' => 'Iceland2Controller',
        ]);
    }
}
