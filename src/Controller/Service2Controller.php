<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class Service2Controller extends AbstractController
{
    /**
     * @Route("/service2", name="service2")
     */
    public function index()
    {
        return $this->render('service2/index.html.twig', [
            'controller_name' => 'Service2Controller',
        ]);
    }
}
